package me.mykindos.client.tracker;

import me.mykindos.client.tracker.session.SessionTracker;
import org.osbot.rs07.Bot;
import org.osbot.rs07.script.MethodProvider;
import org.osbot.rs07.script.Script;

/**
 * Base of entire tracking system
 */
public class Tracker extends MethodProvider {


    public boolean isRunning = false;
    private double updateInterval = 60;
    private String scriptName;
    private SessionTracker sessionTracker;
    private boolean mirrorMode;

    private String apiURL;
    private String apiToken;



    /**
     * Creates an instance of the Tracker with bot context
     *
     * @param bot Bot client
     */
    public Tracker(Bot bot, String scriptName, String url, String apiToken) {
        exchangeContext(bot);
        this.scriptName = scriptName;
        this.mirrorMode = bot.isMirrorMode();
        this.apiURL = url;
        this.apiToken = apiToken;
    }


    /**
     * Starts the tracker
     * Begins tracking:
     * - Exp Gained for all Skills
     * - Time Played
     * - Items gained / lost
     * <p>
     * Requires a connection to the server
     *
     * @return Tracker
     */
    public Tracker start() {


        getExperienceTracker().startAll();
        sessionTracker = new SessionTracker(this);
        isRunning = true;

        return this;
    }

    /**
     * Terminates the Tracker, uploads contents of current session
     */
    public void stop() {
        try {
            isRunning = false;
            sessionTracker.endSession();
            log("Tracker stopping... submitting data");
            Script.sleep(1000); // Allow time for it to all transfer before cutting the connection
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

    }

    /**
     * @return The name of the script
     */
    public String getScriptName() {
        return scriptName;
    }

    /**
     * @return True if tracker is currently running
     */
    public boolean isRunning() {
        return isRunning;
    }

    /**
     * Length of time data is tracked for before uploading
     * @return Time in minutes between each 'session' interval
     */
    public double getUpdateInterval() {
        return updateInterval;
    }

    /**
     * Set the time in minutes between each update to the server
     *
     * @param minutes Minutes between each update
     * @return Tracker
     */
    public Tracker setUpdateInterval(double minutes) {
        updateInterval = minutes;
        return this;
    }

    /**
     *
     * @return Session Tracker
     */
    public SessionTracker getSessionTracker(){
        return sessionTracker;
    }

    public boolean isMirrorMode() {
        return mirrorMode;
    }


    public String getApiURL() {
        return apiURL;
    }

    public String getApiToken() {
        return apiToken;
    }
}
