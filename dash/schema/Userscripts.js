cube(`Userscripts`, {
  sql: `SELECT * FROM OSTracker.userscripts`,
  
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
