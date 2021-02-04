cube(`Skills`, {
  sql: `SELECT * FROM ${process.env.CUBEJS_DB_NAME}.skills`,
  
  joins: {
    
  },
  
  measures: {
    count: {
      type: `count`,
      drillMembers: [id, skillname]
    }
  },
  
  dimensions: {
    id: {
      sql: `id`,
      type: `number`,
      primaryKey: true
    },
    
    skillname: {
      sql: `${CUBE}.\`skillName\``,
      type: `string`
    }
  }
});
