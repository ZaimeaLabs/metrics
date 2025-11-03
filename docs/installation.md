---
title: How to install Metrics package
description: How to install Metrics package
github: https://github.com/zaimealabs/metrics/edit/main/
---

# Metrics

[[TOC]]

## Introduction

This package will help you create ``metrics`` for your models to generate, for example: invoice numbers in your ``Laravel`` application.

## Instalation

You can install the package via composer:

```bash
composer require zaimea/metrics
```

or via composer.json

```json
"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/zaimea/metrics"
        }
    ]
```


## Publish

```bash
    php artisan vendor:publish --tag=metrics
```

## Migrations

Run migrations to create matrics table in your database
```bash
    php artisan migrate
```
