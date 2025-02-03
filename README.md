# Classify Number API

A simple PHP API that classifies a number based on its mathematical properties.

## Features
- Checks if a number is prime, perfect, or an Armstrong number.
- Determines if the number is odd or even.
- Calculates the sum of digits.
- Fetches a fun fact from the Numbers API.

## API Specification

**Endpoint:** 
`GET http://localhost:8000/api/classify-number?number=<number>` for local sever
`GET https://hng-task-one-production.up.railway.app/api/classify-number?number=<number>` for production server


**Parameters:**

* `number` (required): An integer.

**Response (200 OK):**

``json
{
  "number": 371,
  "is_prime": false,
  "is_perfect": false,
  "properties": ["armstrong", "odd"],
  "digit_sum": 11,
  "fun_fact": "371 is an Armstrong number because 3^3 + 7^3 + 1^3 = 371"  
}


**Response (400 Bad Request):**

``json
{
  "number": "alphabet",
  "error": true
}


