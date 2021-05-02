# phpCrud
Make a OOP PHP crud operations with different patterns and tests


How it works:
         It may receive values by all methods, POST or GET, ant it have a series of variables which defines its behavior:
         localhost project URL+ ==>> index.php?st=a&name=4furious&yy=2012&co=MPVolt
         here we will be using GET method by fast and easy to test results
         In the url GET vars "st" defines operation st=a means add to database
         Later it will add to database with this string st=a&name=4furious&yy=2012&co=MPVolt
         name=4furious
         yy=2012 for year of launch the game
         co=MPVolt for the company who created the game
        
         Now st=d&id=20 means st = d to delete or erase a row from database
         id identifyes the row id to delete
        
         And as a last exercide 
