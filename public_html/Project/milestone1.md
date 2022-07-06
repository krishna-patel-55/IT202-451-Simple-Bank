<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Krishna Patel(kp55)</td></tr>
<tr><td> <em>Generated: </em> 7/6/2022 7:18:21 AM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-451-M22/it202-milestone1-deliverable/grade/kp55" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone1 branch</li><li>Create a milestone1.md file in your Project folder</li><li>Git add/commit/push this empty file to Milestone1 (you'll need the link later)</li><li>Fill in the deliverable items<ol><li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e,&nbsp;<a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li></ol></li><li>Ensure your images display correctly in the sample markdown at the bottom</li><li>Save the submission items</li><li>Copy/paste the markdown from the "Copy markdown to clipboard link" or via the download button</li><li>Paste the code into the milestone1.md file or overwrite the file</li><li>Git add/commit/push the md file to Milestone1</li><li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li><li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku dev</li></ol></li><li>Make a pull request from dev to prod (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku prod</li></ol></li><li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li></ol></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177519985-06388b96-445a-456a-a090-3b7c4e762609.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>invalid email validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177520095-a450580e-7ba0-4d18-8609-a47c25d0c604.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>invalid password validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177520187-9a54e7df-250f-401f-8167-78bd23db5755.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>passwords do not match validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177520307-e9e99cd4-a2a4-4c8d-8657-9eacaedfd833.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>email not available validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177520396-d56939c0-f1ba-4856-8d29-51978a637fc6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>username not available validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177520486-5403a500-7851-4b4d-bbe3-c10e45f63c5b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>valid data before submission<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177520556-06b67557-9dc6-4117-92b8-d3a09240eda7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>user table after submission of task1 input<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/10">https://github.com/kx5hu/IT202-451/pull/10</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/24">https://github.com/kx5hu/IT202-451/pull/24</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <ul><li>HTML form requires input fields for email, username, password, and confirming password.</li><li>'required' field<br>will detect upon entry and/or submission when input fields are incorrectly filled according<br>to the email type and submission.</li><li>Further client-side validation is done by checking the<br>input strings for email and username against regex string patterns and passwords are<br>checked if they match. All fields in general are checked in general to<br>make sure they are not empty.</li><li>Upon successful submission of the form, a db<br>connection is called for using the db connection files and url from previous<br>lessons in which the information can be inserted in to the user table<br>hence creating a new user.</li></ul><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177522392-3db6d394-0005-41c7-860f-9b04cb451964.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>passwords mismatch<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177522482-9dd97cd4-ee77-4d5b-a534-c7f5e3d44a79.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>non-existing user<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177522572-c25e1853-bd03-4844-90a3-194c321571f5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>successful login<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/11">https://github.com/kx5hu/IT202-451/pull/11</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/24">https://github.com/kx5hu/IT202-451/pull/24</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <ul><li>HTML form requires input fields for email or username and password.</li><li>'required' field will<br>detect upon entry and/or submission when input fields are incorrectly filled according to<br>the email type or username depending on if initial validation is passed (if<br>string has '@' assume email otherwise username).</li><li>Further client-side validation is done by checking<br>the input strings for email and username against regex string patterns and password<br>is checked by seeing if the string has a valid number of characters.<br>All fields in general are checked in general to make sure they are<br>not empty.</li><li>Upon successful submission of the form, a db connection is called by<br>using the db connection files and url from previous lessons in which the<br>information is set in a SELECT query statement to see if matching data<br>exists in the user table, if so the user is selected as a<br>result.</li></ul><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177523076-f693c6da-1a7d-4736-abea-c0e5913c90f1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>successful logout<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177523172-190e1c00-1461-484b-8120-73076fe473b7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>logged out user cannot access login-protected page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/11">https://github.com/kx5hu/IT202-451/pull/11</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/24">https://github.com/kx5hu/IT202-451/pull/24</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <ul><li>Upon successful submission of the login form, a db connection is called by<br>using the db connection files and url from previous lessons in which the<br>information is set in a SELECT query statement to see if matching data<br>exists in the user table, if so the user is selected as a<br>result.&nbsp;<br></li><li>This result will capture the user information (not password) in a SESSION variable<br>. By calling a session to start, this data is stored for which<br>the user can have access to the pages only users can view and<br>manipulate data through.&nbsp;<br></li><li>Upon logging out, the session will be closed for which the<br>user's information will be destroyed from the session variable that is being passed<br>throughout the pages that the user could access previously. Once this happens, if<br>the user does not log in, directly going to the pages such as<br>home, or profile will not work.</li></ul><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177523172-190e1c00-1461-484b-8120-73076fe473b7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>logged out user cannot access login-protected page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177524463-c0e41332-1e39-49d7-86a2-3546c8d8b9d4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>user without an appropriate role can&#39;t access the role-protected page:<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177524779-610a3747-46b4-43e9-8796-4d72d0919c32.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>roles table with data<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177524866-6377656f-1589-4d77-bc70-ab185f7c3765.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>UserRoles table with valid data<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/25">https://github.com/kx5hu/IT202-451/pull/25</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/12">https://github.com/kx5hu/IT202-451/pull/12</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <ul><li>Upon successful submission of the login form, a db connection is called by<br>using the db connection files and url from previous lessons in which the<br>information is set in a SELECT query statement to see if matching data<br>exists in the user table, if so the user is selected as a<br>result.&nbsp;<br></li><li>This result will capture the user information (not password) in a SESSION variable<br>. By calling a session to start, this data is stored for which<br>the user can have access to the pages only users can view and<br>manipulate data through.&nbsp;<br></li><li>Upon logging out, the session will be closed for which the<br>user's information will be destroyed from the session variable that is being passed<br>throughout the pages that the user could access previously. Once this happens, if<br>the user does not log in, directly going to the pages such as<br>home, or profile will not work.</li></ul><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <ul><li>Upon successful submission of the login form for a admin user (having a<br>role specified), a db connection is called by using the db connection files<br>and url from previous lessons in which the information is set in a<br>SELECT query statement to see if matching data exists in the user table,<br>if so the user is selected as a result for which the user<br>information contains the role.&nbsp;<br></li><li>This result will capture the user information (not password) in<br>a SESSION variable . By calling a session to start, this data is<br>stored for which the user can have access to the pages only users<br>with that specified role can view and manipulate data through.&nbsp;<br></li><li>Upon logging out, the<br>session will be closed for which the user's information will be destroyed (hence<br>the role as well) from the session variable that is being passed throughout<br>the pages that the user could access previously. Once this happens, if the<br>user does not log in OR logs in with an account that does<br>not have a admin role, directly going to the pages such as home,<br>profile, INCLUDING admin pages will not work.</li></ul><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177526804-8c65b2fe-983c-4108-a673-debb1e57998c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>styled navigation with toggle<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177527078-713aceca-886b-4c64-a738-01590d5b9912.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>styled form<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177527080-7413b496-1268-4e8a-9434-11ee84ef97be.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>styled form<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177527082-4e8ac7f5-973f-4692-a156-6183675e90b3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>styled form<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177527325-8bf35c39-c9e7-4903-9001-1981a48a578b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>styled tables, fonts, background, tables, buttons, etc<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/11">https://github.com/kx5hu/IT202-451/pull/11</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/24">https://github.com/kx5hu/IT202-451/pull/24</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/27">https://github.com/kx5hu/IT202-451/pull/27</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/29">https://github.com/kx5hu/IT202-451/pull/29</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <ul><li>removed peptobismol styling from video</li><li>body tag: background color updated<br></li><li>nav tag: background color to<br>distinguish the bar specified,</li><li>ul tag only in nav for all list items: removed<br>default item list style, removed any margins, added a small padding, hidden overflow</li><li>il<br>tag for only in nav: added margin to space items out, floated items<br>to begin listing from left</li><li>removed link underline using nav a:link tags</li><li>used nav a<br>tags to edit text font, weight, transformation to match with the rest of<br>the webpages</li><li>used nav a:hover to change the background color of each a element<br>when being hovered or clicked upon</li><li>centered all form, h1, and table elements.</li><li>submit and<br>search button given text transformations and hover background color same as a:hovering color</li><li>tables<br>for admin given border and header changes to look more presentable and easier<br>to view</li></ul><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177527861-da3148d8-4d9d-40f0-80a5-1c81371a342f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>examples of errors/messages<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177527687-7c430754-dd1a-4651-9692-510421c9149f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>examples of errors/messages<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177527688-4590f0fe-004b-42fd-8f78-869a1b199366.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>examples of errors/messages<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177527713-418f03d0-4af3-4077-9ec5-a5d96c401ebb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>examples of errors/messages<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177527757-97c7a05f-ea07-406b-be3c-52208216c20e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>examples of errors/messages<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177527798-616a157e-c20e-4bb3-9c3d-ec537d384b37.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>examples of errors/messages<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/13">https://github.com/kx5hu/IT202-451/pull/13</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/24">https://github.com/kx5hu/IT202-451/pull/24</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/26">https://github.com/kx5hu/IT202-451/pull/26</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/29">https://github.com/kx5hu/IT202-451/pull/29</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>Implementing client-side validation using flash messages allowed for editing messages to be displayed<br>before any submission. this prevents ineligible errors to be displayed to the user<br>from the db.<div>Edited the flash messages to be simple, indicating which area needed<br>to be re-entered before submission, and/or why errors occurred after submission of form.</div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177528879-4c43b7f2-45d1-4216-9274-3db97d04f86a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>user profile page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/14">https://github.com/kx5hu/IT202-451/pull/14</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/24">https://github.com/kx5hu/IT202-451/pull/24</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>the session contains user information (email and username). these profile fields are populated<br>by grabbing them from the associative session array and populates the form.&nbsp;<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177531160-08939d61-4cdf-46e1-9b9b-70ee7b10f36e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>username validation message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177531254-b1d2400b-9622-45f6-9871-c17b2db6ce2f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p> email validation message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177531341-0cffcff7-9ea0-4063-82ea-d256cec4d84b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>password validation message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177531408-d99cadb5-b970-472a-a455-245e765b5ee6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>password mismatch message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177531543-b5cb45c5-6797-4eda-92b2-b7922215e867.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>email already in use message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177531601-e8b04e7e-5f2a-431a-ba26-6a84bccb021f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>username already in use message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177532290-213280a1-37c1-4fa6-b1df-eff90c980060.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>before<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177532310-dacfcb1c-380d-4adb-9118-818a7dbb28aa.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>before submitting<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177532449-23e6a978-a808-4d9e-aaf4-3090ab181c8a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>after submitting<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177532463-59adb26e-1ca0-4d6f-9a37-f76f2afb2497.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>after table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/14">https://github.com/kx5hu/IT202-451/pull/14</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/24">https://github.com/kx5hu/IT202-451/pull/24</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/30">https://github.com/kx5hu/IT202-451/pull/30</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>every-time the user updates the profile successfully the values are updated in the<br>sql query for updating the user fields, then the session fields then also<br>are updated and hence the form that is displayed with already populated email<br>and username.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Issues and Project Board </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177533677-62603615-0542-43de-a349-fd1e6386f336.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>project board<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177533717-97538eff-5adb-4a0a-a3a9-01f5793ddc69.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>project board<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/177533724-08cbed45-e179-4644-a40f-f54194e053aa.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>project board<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Include a direct link to your Project Board</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/projects/1">https://github.com/kx5hu/IT202-451/projects/1</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Prod Application Link to Login Page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://kp55-prod.herokuapp.com/Project/login.php">https://kp55-prod.herokuapp.com/Project/login.php</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-451-M22/it202-milestone1-deliverable/grade/kp55" target="_blank">Grading</a></td></tr></table>