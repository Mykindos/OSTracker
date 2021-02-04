cube(`Users`, {
  sql: `SELECT * FROM ${process.env.CUBEJS_DB_NAME}.users`,
  
  joins: {
    
  },
  
  measures: {
    count: {
      type: `count`,
      drillMembers: [id, name, createdAt, updatedAt]
    }
  },
  
  dimensions: {
    apiToken: {
      sql: `api_token`,
      type: `string`
    },
    
    email: {
      sql: `email`,
      type: `string`
    },
    
    id: {
      sql: `id`,
      type: `number`,
      primaryKey: true
    },
    
    name: {
      sql: `name`,
      type: `string`
    },
    
    password: {
      sql: `password`,
      type: `string`
    },
    
    rememberToken: {
      sql: `remember_token`,
      type: `string`
    },
    
    createdAt: {
      sql: `created_at`,
      type: `time`
    },
    
    updatedAt: {
      sql: `updated_at`,
      type: `time`
    },
    
    emailVerifiedAt: {
      sql: `email_verified_at`,
      type: `time`
    }
  }
});
