package me.mykindos.client.tracker.session;

import me.mykindos.client.tracker.Tracker;
import me.mykindos.client.tracker.api.APIHandler;
import org.osbot.rs07.api.ui.Skill;

import java.util.Arrays;
import java.util.HashMap;


/**
 * Manages the session
 * EXP, Item, and Time Tracking
 */
public class SessionTracker {

    private Session session;
    private HashMap<Skill, Integer> expPerSkill;
    private Tracker tracker;
    private TrackerThread trackerThread;
    private double version;

    /**
     * Starts the SessionTracker
     *
     * @param tracker Tracker
     */
    public SessionTracker(Tracker tracker) {
        this.tracker = tracker;
        this.expPerSkill = new HashMap<>();
        session = new Session(tracker);
        session.setMirrorMode(tracker.isMirrorMode());
        Arrays.stream(Skill.values()).forEach(s -> {
            expPerSkill.put(s, 0);
        });

        trackerThread = new TrackerThread(this);
        trackerThread.start();
    }


    /**
     * Ends the current tracking session, prepares data for transfer to server
     */
    public void endSession() {

        Arrays.stream(Skill.values()).forEach(s -> {
            session.getExpGained().put(s, tracker.getExperienceTracker().getGainedXP(s) - expPerSkill.get(s));
            expPerSkill.put(s, tracker.getExperienceTracker().getGainedXP(s));
        });

        session.setRunTime(System.currentTimeMillis() - session.getStartTime());
        APIHandler.submitSessionData(tracker.getApiURL(), tracker.getApiToken(), tracker.getClient().getUsername(),
                tracker.getScriptName(), String.valueOf(getVersion()), session);

        session = new Session(tracker);

    }

    /**
     * @return Tracker
     */
    public Tracker getTracker() {
        return tracker;
    }

    /**
     * @return Current session
     */
    public Session getSession() {
        return session;
    }

    public double getVersion() {
        return version;
    }

    public void setVersion(double version) {
        this.version = version;
    }
}
