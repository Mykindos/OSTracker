cube(`Experiencegained`, {
  sql: `SELECT * FROM ${process.env.CUBEJS_DB_NAME}.experiencegained`,
  
  joins: {
    BotUsers: {
      sql: `${CUBE}.\`botUserID\` = ${BotUsers}.id`,
      relationship: `belongsTo`
    },
    
    Scripts: {
      sql: `${CUBE}.\`scriptID\` = ${Scripts}.id`,
      relationship: `belongsTo`
    },
    
    Skills: {
      sql: `${CUBE}.\`skillID\` = ${Skills}.id`,
      relationship: `belongsTo`
    }
  },
  
  measures: {
    count: {
      type: `count`,
      drillMembers: [id, createdAt, updatedAt]
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
