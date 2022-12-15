# Problem

We have two providers collect data from them in json files we need to read and make some filter operations on them to get the result

DataProviderX data is stored in [DataProviderX.json]
DataProviderY data is stored in [DataProviderY.json]
`DataProviderX schema is

{
  parentAmount:200,
  Currency:'USD',
  parentEmail:'parent1@parent.eu',
  statusCode:1,
  registerationDate: '2018-11-30',
  parentIdentification: 'd3d29d70-1d25-11e3-8591-034165a3a613'
}
we have three status for DataProviderX

authorised which will have statusCode 1
decline which will have statusCode 2
refunded which will have statusCode 3
`DataProviderY schema is

{
  balance:300,
  currency:'AED',
  email:'parent2@parent.eu',
  status:100,
  created_at: '22/12/2018',
  id: '4fc2-a8d1'
}
we have three status for DataProviderY

authorised which will have statusCode 100
decline which will have statusCode 200
refunded which will have statusCode 300

# Architecture
- Domain Driven Desing
- Service Oriented Architecure

# Design patterns used
- Repository
- Service Provider

# installation
- use `composer install `

- run the project using docker `./vendor/bin/sail up` which will prepare the env, images and host the project on `http://localhost`


# Hints:

- core laravel folders
`cd Application/Src/core`

- main controller
`Application/Src/core/Http/Controllers`

- data json files
`Application/Src/storage/json`

- services and repositories are placed into Domain folder to separate the domain logic from the application logic (controllers)

- Infrastructure folder is dummy folder to use in case of using databases and ORMs

- Interfaces for Repositories and Services in `Domain/Contracts`

# Available endpoints and filters:
- Endpoint: `http://localhsots/api/v1/users`
- filters examples:
`/api/v1/users?provider=DataProviderX`
`/api/v1/users?balanceMin=200&balanceMax=300`
`/api/v1/users?statusCode=authorised`
`/api/v1/users?currency=USD`

or you can mix between these filters.
If you need more filters you will add it to the provider repository to handle based on each provider json strcuture.
If you need to add more providers, you are able to create a new entity and repository to handle the new provider structure and use it in the service already exist.
