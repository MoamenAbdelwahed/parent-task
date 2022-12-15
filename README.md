# Problem

We have two providers collect data from them in json files we need to read and make some filter
operations on them to get the result.

# Architecture
- Domain Driven Desing
- Service Oriented Architecure

# Design patterns used
- Repository
- Service Provider

# Setup 
- create your .env file

- install dependencies
`composer install `

- run the project using docker
`./vendor/bin/sail up`

- core laravel folders
`cd Application/Src/core`

- main controller
`Application/Src/core/Http/Controllers`

- data json files
`Application/Src/storage/json`

# Hints:


- services and repositories are placed into Domain folder to separate the domain logic from the application logic (controllers)
- Infrastructure folder is dummy folder to use in case of using databases and ORMs
- Interfaces for Repositories and Services in `Domain/Contracts`
