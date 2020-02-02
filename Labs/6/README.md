## Lab Contents
- index.php (lab6 code)
- README.md (this file)

## Questions

1. I made a class for every operation, which follows basic OOP principles. I also made sure that each operation checks the operands it needs. As for the logic flow, someone inputs the operands, and clicks a button. This sends out a POST request, in which the code will attach an operation class to its associated button. Then the button's function calls the associated operation class. It will call the getEquation(), which in turn then called the operate() method of the function. The operate function returns the computed value.

2. In terms of application functionality, not much would change. However, an issue would arise when we initially load the website. When we get to the website, we call a "GET", so we would have to find a way to make sure the form doesn't evaluate on the first load, as no operands have been input.

3. There are a few things we can do. For one, we could change the giant if sequence into switch cases, which would be more readable. We could also write code that will attach each button to its associated function upon page load, rather than do it dyanically. This would be useful, but would require slightly longer (milliseconds) load time.

