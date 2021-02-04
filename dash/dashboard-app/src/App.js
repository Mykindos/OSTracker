import './body.css';
import { makeStyles } from '@material-ui/core/styles';
import React from 'react';
import cubejs from '@cubejs-client/core';
import { CubeProvider } from '@cubejs-client/react';
import Header from './components/Header';
const API_URL = "http://api.mykindos.me:4000";
const CUBEJS_TOKEN = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpYXQiOjE2MTI0NDkwNjQsImV4cCI6MTYxMjUzNTQ2NH0.GuF7jsbxlxAfpDVrHJSZS2fbqye5Lp6X5HtywyOJFqk";
const cubejsApi = cubejs(CUBEJS_TOKEN, {
  apiUrl: `${API_URL}/cubejs-api/v1`
});
const useStyles = makeStyles(() => ({
  root: {
    flexGrow: 1
  }
}));

const AppLayout = ({
  children
}) => {
  const classes = useStyles();
  return <div className={classes.root}>
      <Header />
      <div>{children}</div>
    </div>;
};

const App = ({
  children
}) => <CubeProvider cubejsApi={cubejsApi}>
    <AppLayout>{children}</AppLayout>
  </CubeProvider>;

export default App;