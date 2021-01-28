package me.mykindos.client.tracker.session;

import me.mykindos.client.tracker.api.APIHandler;
import me.mykindos.utilities.UtilTime;
import org.osbot.rs07.api.model.Item;
import org.osbot.rs07.api.ui.Skill;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.ListIterator;

/**
 * Object for storing all data in the current period.
 * When a new interval starts, the session is reset and all previous data is uploaded to the server
 */
public class Session {


    private HashMap<Skill, Integer> expGained;
    private List<ItemData> itemData;
    private long startTime;
    private long runTime;
    private List<String> logs;
    private boolean mirrorMode;


    /**
     * Create a session with the current system time
     */
    public Session(){
        this.startTime = System.currentTimeMillis();
        expGained = new HashMap<>();
        itemData = new ArrayList<>();
        logs = new ArrayList<>();
    }

    /**
     * Create Session with a start time in MS
     * @param startTime
     */
    public Session(long startTime){
        this.startTime = startTime;
    }


    /**
     * @return Session start time
     */
    public long getStartTime() {
        return startTime;
    }

    /**
     * Sets the time commenced since the session started.
     * @param runTime Unix timestamp
     */
    public void setStartTime(long runTime){
        this.startTime = runTime;
    }


    /**
     * @return Current run time of this session
     */
    public long getRunTime() {
        return runTime;
    }

    /**
     * Sets the time commenced since the session started.
     * @param runTime Unix timestamp
     */
    public void setRunTime(long runTime){
        this.runTime = runTime;
    }

    /**
     * Hashmap of exp gains for each skill this session
     * @return HashMap of exp gains
     */
    public HashMap<Skill, Integer> getExpGained(){
        return expGained;
    }

    /**
     * @return List of Items that have been Gained / Lost / Spent
     */
    public List<ItemData> getItemData() {
        return itemData;
    }

    /**
     * Add new item to the session.
     * Will increment existing entries to prevent mass database entries
     * @param item the item
     * @param amount Amount of item
     * @param status Item status (Received, Lost, Spent)
     */
    public void addItem(Item item, int amount, String status){
        ListIterator<ItemData> items = itemData.listIterator();
        while(items.hasNext()){
            ItemData data = items.next();
            if(!data.getName().equalsIgnoreCase(item.getName())) continue;
            if(!data.getStatus().equalsIgnoreCase(status)) continue;

            data.setAmount(data.getAmount() + amount);
            data.setPrice(APIHandler.getPrice(item.getId()) * data.getAmount());
            return;
        }

        itemData.add(new ItemData(item.getName(), amount, status, APIHandler.getPrice(item.getId()) * amount));
    }

    /**
     *
     * @return List of logs, e.g. errors or generic messages
     */
    public List<String> getLogs(){
        return logs;
    }

    private long lastLogUpload = 0;
    /**
     * Upload a log to the database

     * @param log Log (e.g. stacktrace or generic message)
     */
    public  void addLog(String log){
        if(UtilTime.elapsed(lastLogUpload, 60_000)) {
            logs.add(log);
            lastLogUpload = System.currentTimeMillis(); // Prevent upload spam
        }
    }


    public boolean isMirrorMode() {
        return mirrorMode;
    }

    public void setMirrorMode(boolean mirrorMode) {
        this.mirrorMode = mirrorMode;
    }
}
