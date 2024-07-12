
To build the docker image 
```bash
docker-compose build
````
To run the docker container
```bash
docker-compose up -d
```
To run the app 
```bash
docker-compose exec php composer run-app
```
Run the unit tests
```bash
docker-compose exec php composer tests
```