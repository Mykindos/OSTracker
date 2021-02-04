cube(`Item`, {
  sql: `SELECT * FROM ostracker.item`,
  
  joins: {
    
  },
  
  measures: {
    count: {
      type: `count`,
      drillMembers: [id, itemname]
    }
  },
  
  dimensions: {
    id: {
      sql: `id`,
      type: `number`,
      primaryKey: true
    },
    
    itemname: {
      sql: `${CUBE}.\`itemName\``,
      type: `string`,
      title: `Item`
    }
  }
});
