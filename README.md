# Package Template

This repo is used to quickly make new packages. It contains basic set of features that might be used in a package and its structure.

Usage involves review and renaming:

- PackageServiceProvider.php
  - Namespace
  - Config key
  - Resources key
    
- config/package-config.php
  - Add folder if required `/config`
    
- migrations
  - Added folder 'migrations' to enable `/migrations`
    
- Resources / views
  - Create folder to enable `/resources/views`
    
- composer.json
  - Rename name
  - Autoload namespace
  - Provider namespace to match service provider  
