cube(`Scriptitems`, {
  sql: `SELECT * FROM OSTracker.scriptitems`,

  joins: {
    BotUsers: {
      sql: `${CUBE}.\`botUserID\` = ${BotUsers}.id`,
      relationship: `belongsTo`
    },

    Item: {
      sql: `${CUBE}.\`itemID\` = ${Item}.id`,
      relationship: `belongsTo`
    },

    Scripts: {
      sql: `${CUBE}.\`scriptID\` = ${Scripts}.id`,
      relationship: `belongsTo`
    },

    Itemstatus: {
      sql: `${CUBE}.\`itemStatusID\` = ${Itemstatus}.id`,
      relationship: `belongsTo`
    }
  },

  measures: {
    count: {
      type: `count`,
      drillMembers: [id, createdAt, updatedAt]
    },

    amount: {
      sql: `amount`,
      type: `sum`
    },

    price: {
      sql: `price`,
      type: `sum`,
      format: `currency`
    },

    priceMax: {
      sql: `MAX(price)`,
      type: `number`
    },

    priceFormat: {
      sql: `FORMAT(price, 0)`,
      type: `number`,
      title: `Profit`
    }

  },

  dimensions: {
    id: {
      sql: `id`,
      type: `number`,
      primaryKey: true
    },

    createdAt: {
      sql: `created_at`,
      type: `time`
    },

    updatedAt: {
      sql: `updated_at`,
      type: `time`
    }
  }
});
