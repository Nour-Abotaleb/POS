# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2024-01-01

### Added
- Initial release of ZATCA Laravel Package
- Full ZATCA Phase 2 compliance
- B2C Invoice reporting to ZATCA API
- QR Code generation using Salla ZATCA library
- UBL 2.1 XML generation and digital signing
- Queue support for background processing
- Flexible model integration via interfaces
- Comprehensive logging and error handling
- Artisan commands for testing and reporting
- Support for multiple environments (developer, simulation, production)
- Database migrations for ZATCA-related fields
- Trait for easy integration with existing models
- Facade for convenient access to ZATCA services
- Comprehensive documentation and examples

### Features
- **ZatcaService**: Core service for ZATCA operations
- **Interfaces**: Flexible contracts for invoice and company models
- **Models**: Ready-to-use Eloquent models for ZATCA data
- **Jobs**: Queue jobs for background ZATCA reporting
- **Commands**: Artisan commands for testing and manual reporting
- **Traits**: Easy integration with existing Laravel models
- **Exceptions**: Custom exception handling for ZATCA errors
- **Configuration**: Comprehensive configuration options
- **Migrations**: Database structure for ZATCA integration

### Supported Operations
- Report B2C invoices to ZATCA within 24 hours
- Generate ZATCA-compliant QR codes
- Handle invoice counter (ICV) and previous invoice hash (PIH)
- Digital signing of XML invoices
- Multiple payment method support
- Tax calculation and reporting
- Error handling and retry mechanisms

### Requirements
- PHP 8.2+
- Laravel 10.x, 11.x, or 12.x
- Salla ZATCA package for XML signing
- Guzzle HTTP client for API communication