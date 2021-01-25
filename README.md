# OSTracker

OSTracker is a laravel based API designed to track and store data for scripts on OSBot. API is not dependent on OSBot to operate, however the client side implementation in this repository is designed around the OSBot API. If you would like to implement it on another client e.g. RuneLite, you will have to create your own implementation.

## Client-side installation
Integration with your OSBot script is relatively simple. Simply copy the contents of the client directory in this repo into your scripts code base.

In your scripts onStart, you should initialise OSTracker like so.

```java
private Tracker tracker;

@Override
public void onStart(){
        try {
		tracker = new Tracker(getBot(), getName(), "BASE_API_URL", "YOUR_TOKEN")
				.setUpdateInterval(30) // Defaults to an hour
				.start(); // Optional
		tracker.getSessionTracker().setVersion(getVersion());
		
	} catch (Exception e) {
		if (tracker != null) {
			tracker.stop();
		}
		e.printStackTrace();
	}
}
```

Your token will be created when deploying the laravel API to your server, or it will be provided to you if you are choosing to integrate with somebody elses API.
