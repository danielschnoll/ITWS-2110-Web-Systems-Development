## Lab Contents
- lab5.html
- README.md (this file)
- ./screenshots

## Part 0 Observations
Trying to load the original document has a total load time of 1.02s. It took ~300ms to load the DOM and an additional ~700ms to finish loading the page

## Part 1 Observations
The original document just listed out all <li> elements, so I removed all <li> elements inside the <ul> parent except for one. The javascript would then target this <ul> element and populate it with 5000 <li> elements. This greatly reduced the file size, as it went from 5000+ lines to just 2 dozen.

## Part 2 Observations
Front end performance largely rests on how optimized the code is. As we learned from the Google video in class, putting scripting information in the header causes the browser to get stuck with processing, because the script often targets elements that haven't been loaded yet. It has to wait for the rest of the page to load before it can successfully execute. So, putting script tags in the bottom of the body ensures the page fully loads before executing javascript code.

You can also optimize CSS by putting stylesheet information in the header tags. Similar to the JS issues, when the parser reaches the style tags, it makes a request for the CSS file. That needs to be fully loaded before the rest of the HTML can load. A solution to this is by putting only the important / a minimal amount of styling in the header tags and load the rest via JS. 

## Additional Comments
After doing both the Part 1 and Part 2 fixes, the total load time was reduced from 1.02s to 600ms. The DOM loaded in a much faster 100ms, and the JS finished executing at the 600ms mark. The above observations list 3 front end optimizations, but two more optimizations include the use build tools to minify the CSS and JS thus reducing its file size, and doing server-side tweaks such as caching to make sure files that get used repeatedly are readily accessible to the end user.