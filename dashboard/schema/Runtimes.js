cube(`Runtimes`, {
  sql: `SELECT * FROM OSTracker.runtimes`,

  joins: {
    BotUsers: {
      sql: `${CUBE}.\`botUserID\` = ${BotUsers}.id`,
      relationship: `belongsTo`
    },

    Scripts: {
      sql: `${CUBE}.\`scriptID\` = ${Scripts}.id`,
      relationship: `belongsTo`
    }
  },

  measures: {
    count: {
      type: `count`,
      drillMembers: [id, createdAt, updatedAt]
    },

    duration: {
      sql: (`duration` / 3600000),
      type: `sum`
    },

    durationHours: {
      sql: `ROUND(SUM(duration) / 3600000)`,
      type: `number`,
      title: `Hours Ran`
    }
  },

  dimensions: {
    id: {
      sql: `id`,
      type: `number`,
      primaryKey: true
    },

    version: {
      sql: `version`,
      type: `string`
    },

    createdAt: {
      sql: `DATE_FORMAT(created_at, '%M')`,
      type: `time`
    },

    updatedAt: {
      sql: `updated_at`,
      type: `time`
    }
  }
});
