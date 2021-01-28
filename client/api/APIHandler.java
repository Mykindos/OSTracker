package me.mykindos.client.tracker.api;


import me.mykindos.client.tracker.Tracker;
import me.mykindos.client.tracker.session.Session;

import java.io.*;
import java.net.*;
import java.util.HashMap;
import java.util.Map;
import java.util.stream.Collectors;

public class APIHandler {

    private static void submitRequest(String apiURL, String token, Map<String, Object> bodyParams) {

        try {
            URL url = new URL(apiURL);
            StringBuilder postData = new StringBuilder();
            for (Map.Entry<String, Object> param : bodyParams.entrySet()) {
                if (postData.length() != 0) postData.append('&');
                postData.append(URLEncoder.encode(param.getKey(), "UTF-8"));
                postData.append('=');
                postData.append(URLEncoder.encode(String.valueOf(param.getValue()), "UTF-8"));
            }

            byte[] postDataBytes = postData.toString().getBytes("UTF-8");

            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            conn.setRequestMethod("POST");
            conn.setRequestProperty("Authorization", "Bearer " + token);
            conn.setRequestProperty("Content-Type", "application/x-www-form-urlencoded");
            conn.setRequestProperty("Content-Length", String.valueOf(postDataBytes.length));
            conn.setDoOutput(true);
            conn.getOutputStream().write(postDataBytes);

            try (BufferedReader br = new BufferedReader(
                    new InputStreamReader(conn.getInputStream(), "utf-8"))) {
                System.out.println(br.readLine());
            }

        } catch (IOException e) {
            e.printStackTrace();
        }

    }

    public static void submitSessionData(String apiURL, String token, String username, String scriptName, String version, Session session) {

        new Thread(() -> {
            // Submit runtime data
            Map<String, Object> runtimeParams = new HashMap<>();
            runtimeParams.put("scriptName", scriptName);
            runtimeParams.put("user", username);
            runtimeParams.put("version", version);
            runtimeParams.put("duration", session.getRunTime());
            submitRequest(apiURL + "runtime", token, runtimeParams);

            System.out.println(apiURL + "runtime");

            // Submit experience data
            Map<String, Object> expParams = new HashMap<>();
            expParams.put("scriptName", scriptName);
            expParams.put("user", username);
            String expJson = "{" + session.getExpGained().entrySet().stream().filter(e -> e.getValue() > 0).map(e -> "\"" + e.getKey().toString() + "\":"
                    + e.getValue()).collect(Collectors.joining(", ")) + "}";
            expParams.put("exp", expJson);
            submitRequest(apiURL + "experience", token, expParams);

            // Submit item data
            Map<String, Object> itemParams = new HashMap<>();
            itemParams.put("scriptName", scriptName);
            itemParams.put("user", username);
            String itemsJson = "[" + session.getItemData().stream().map(e -> "{\"name\":" + "\"" + e.getName() + "\",\"status\":"
                    + "\"" + e.getStatus() + "\",\"amount\":" + e.getAmount() + ",\"price\":" + e.getPrice() + "}").collect(Collectors.joining(", ")) + "]";
            itemParams.put("items", itemsJson);
            submitRequest(apiURL + "items", token, itemParams);

            // Submit log data
            for (String log : session.getLogs()) {
                Map<String, Object> logParams = new HashMap<>();
                logParams.put("scriptName", scriptName);
                logParams.put("user", username);
                logParams.put("version", version);
                logParams.put("mirror", session.isMirrorMode());
                logParams.put("log", log);
                submitRequest(apiURL + "log", token, logParams);
            }
        }).start();


    }

    private static HashMap<Integer, Integer> cache = new HashMap<>();

    private static final String PRICE_URL = "https://v51zl41bph.execute-api.us-west-2.amazonaws.com/prod?itemId=";


    public static int getPrice(int itemID) {
        if (itemID == 995) return 1;

        if (cache.containsKey(itemID)) {
            return cache.get(itemID);
        }
        int price = 0;
        try {

            BufferedReader in = null;
            try {
                URL url = new URL(PRICE_URL + itemID);
                URLConnection connect = url.openConnection();
                in = new BufferedReader(new InputStreamReader(connect.getInputStream()));
                price = Integer.valueOf(in.readLine());
                cache.put(itemID, price);

            } finally {
                if (in != null) {
                    in.close();
                }
            }

        }catch(IOException e){
            e.printStackTrace();
        }

        return price;
    }
}
