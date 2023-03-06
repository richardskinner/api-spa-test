# Pokemon Test

The application consists of 3 components, an API, SPA and MySQL DB. This test was to show ability in configuring 
multiple components and building a basic Backend and Frontend that can communicate with each other.

## Installation

#### PHP Application

```bash
docker exec -it api_srv bash
composer install
```

#### VUE Application

```bash
docker exec -it vue_spa bash
npm install
npm run serve
```

NOTE: I did try to set up automatically through Dockerfile but this failed when attempting to do this
for the VUE app as I couldn't use the COPY command within the Dockerfile due to context issues.

## Application

Vue App runs on http://localhost:8081

## Improvements

### API
