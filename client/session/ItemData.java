package me.mykindos.client.tracker.session;

/**
 * Contains data relevant to an item.
 * Stores its name, the amount, and status (e.g. gained or lost)
 */
public class ItemData {

    private String name;
    private String status;
    private int amount;
    private int price;

    /**
     * Create an ItemData Object
     * @param name Name of item
     * @param amount Amount in stack
     * @param status Status of item (Gained / Lost / Etc)
     */
    public ItemData(String name, int amount, String status, int price){
        this.name = name;
        this.amount = amount;
        this.status = status;
        this.price = price;
    }

    /**
     * @return Item Name
     */
    public String getName() {
        return name;
    }

    /**
     * @return Item Status
     */
    public String getStatus() {
        return status;
    }

    /**
     * @return Amount in stack
     */
    public int getAmount() {
        return amount;
    }

    /**
     * Set the amount of the item
     * @param amount Amount
     */
    public void setAmount(int amount){
        this.amount = amount;
    }


    public int getPrice() {
        return price;
    }

    public void setPrice(int price) {
        this.price = price;
    }
}
