# Openstream MagentoBugFixes

Various fixes which have not yet been applied to 2.1 or 2.2

## 1. Category Top Navigation / Maximal Depth configuration not working
https://github.com/magento/magento2/issues/7543

There is a configuration option `Stores > Configuration > Catalog > Catalog > Category Top Navigation > Maximal Depth` in the admin which limits the depth of the top Navigation. It is currently not being used when the topnav is built.

This extension applies the fixes which have been merged into 2.3-develop branch:
https://github.com/magento/magento2/pull/12640
