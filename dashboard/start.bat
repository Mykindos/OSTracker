docker run --rm --name dash -e CUBEJS_API_SECRET=66468e27accabf1398d10677f0e344c4420060fad8391fd5f58ed520fd3cd7c3fe0ce770767d2246a844ed8a599acbdb279ce05f45de1c4bd7d249185608cb30 -e CUBEJS_DB_HOST=host.docker.internal -e CUBEJS_DB_NAME=ostracker -e CUBEJS_DB_USER=root -e CUBEJS_DB_PASS=B9516254 -e CUBEJS_DB_TYPE=mysql -v "/cube/conf" cubejs/cube:latest

pause