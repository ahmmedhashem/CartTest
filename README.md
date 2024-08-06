# Acme Widget Co Sales System

This is a proof of concept for Acme Widget Co's new sales system. The system calculates the total cost of a basket, including special offers and delivery charges.

## Setup

1. Clone the repository.
2. Run `composer install` to install dependencies.

## Running Tests

Run `vendor/bin/phpunit` to execute the unit tests.

## Assumptions

- The basket can contain multiple products.
- Special offers are applied before delivery charges.
- Delivery charges are based on the total cost after applying special offers.

## Example Baskets

- B01, G01 => $37.85
- R01, R01 => $54.37
- R01, G01 => $60.85
- B01, B01, R01, R01, R01 => $98.27
