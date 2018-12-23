Manual Installation instructions: First of all, download the plugin from the magento Marketplace, then:

1. Create the folder /app/code/Frostmage/WBTPDC
2. Extract all files in that folder
3. php bin/magento setup:upgrade
4. php bin/magento setup:static-content:deploy
5. php bin/magento c:c
6. php bin/magento c:f
7. Done

To check if the module is active, run php bin/magento module:status

Once activated, go to Store -> Configuration -> Frostmage Extensions -> Weight Based Taxes and add the value of your weight based tax.
Go to the products that need a wbt and turn on the custom attribute "Has Weight Based Tax".

Now, that value you just entered will be multiplied by the product's weight and added to it's price as soon as the item is added to 
the cart.
