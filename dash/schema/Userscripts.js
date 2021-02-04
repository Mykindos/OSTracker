cube(`Userscripts`, {
  sql: `SELECT * FROM ${process.env.CUBEJS_DB_NAME}.userscripts`,
  
  joins: {
    Scripts: {
      sql: `${CUBE}.\`scriptID\` = ${Scripts}.id`,
      relationship: `belongsTo`
    },
    
    Users: {
      sql: `${CUBE}.\`userID\` = ${Users}.id`,
      relationship: `belongsTo`
    }
  },
  
  measures: {
    count: {
      type: `count`,
      drillMembers: [id]
    }
  },
  
  dimensions: {
    id: {
      sql: `id`,
      type: `number`,
      primaryKey: true
    }
  }
});
