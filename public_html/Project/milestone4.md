<table><tr><td> <em>Assignment: </em> IT202 Milestone 4 Bank Project</td></tr>
<tr><td> <em>Student: </em> Krishna Patel(kp55)</td></tr>
<tr><td> <em>Generated: </em> 8/7/2022 8:09:49 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-451-M22/it202-milestone-4-bank-project/grade/kp55" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone4 branch</li><li>Create a new markdown file called milestone4.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone4.md</li><li>Add/commit/push the changes to Milestone4</li><li>PR Milestone4 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes</li><li>Submit the direct link to this new milestone4.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on GitHub and everywhere else. Images are only accepted from dev or prod, not localhost. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User can set their profile to public or private </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of new column on the Users table</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183313856-c21d7ed2-2d9b-4563-9ecb-35169fa65089.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>new column on the Users table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of updated profile edit view</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183313872-6dbe203d-b770-4866-8058-06e8804ddaac.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>updated profile edit view<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183313878-534d4a56-8a71-43ec-a976-d7059bc6e51d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>updated profile edit view (scrolled down)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of profile view view (ensure email isn't shown publicly)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183313922-cef94f29-e980-4072-89e1-a1d9ded4dad3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>profile view view from logged in user<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183313942-1688796b-e48d-46a9-b054-0afb5c256199.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>public profile view view of other user<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s) links</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/79">https://github.com/kx5hu/IT202-451/pull/79</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add direct link to a public profile from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://kp55-prod.herokuapp.com/Project/profile.php?id=4">https://kp55-prod.herokuapp.com/Project/profile.php?id=4</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic behind how public/private profile works</td></tr>
<tr><td> <em>Response:</em> <ul><li>A column is added to users table to indicate is a user has<br>true or false visibility, by default all users will have a false meaning<br>private profile.&nbsp;</li><li>Upon toggling in the edit profile page to set the visibility to<br>either true or false, the user can display either a private or public<br>profile.</li><li>The code checks for if a user that is logged in is viewing<br>their own profile: can view their name, email, username, net-worth, and when they<br>joined.</li><li>If the user is logged in but is viewing someone else's profile, the<br>code checks first if that profile is public or private,&nbsp;</li><li>If private, the user<br>wont be able to view anything otherwise they can only view the username,<br>net-worth, and when the user joined,</li><li>logged out users wont be able to view<br>anything.</li></ul><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> User will be able to open a savings account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the create account page for savings with the form filled in</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314052-6ba28e07-c4a3-4cb2-873f-629387a65018.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>create account page for savings with the form filled in<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the code that determines the APY</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314075-785db66e-76c0-45fd-992b-7b940e26f54d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>code that determines the APY<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshots of the related error and success messages when creating a savings account</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314089-bc611cde-8258-4b5c-a1e4-d6cafeaa5706.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>entering $0 deposit error <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314093-377716a3-62be-4f1b-b8d9-e8ea0a8dd9ae.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>entering negative value deposit error <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314296-c078528d-6839-4be8-afb8-5e4e7d6efeca.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>no account type (checking savings or loans) selected<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314097-217c9b55-bd2b-40f1-b8ef-d1b844fb10a2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>success message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add screenshot(s) of the db showing the new savings account</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314163-e3ce85d9-6296-45d7-915d-99012d2d82be.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>db showing the new savings account (last entry)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314218-e239d2bd-fc0e-4ec1-a83a-7e2576630923.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>SystemProperties table data (name = savings)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/82">https://github.com/kx5hu/IT202-451/pull/82</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/80">https://github.com/kx5hu/IT202-451/pull/80</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/81">https://github.com/kx5hu/IT202-451/pull/81</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Add link to the related page on heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://kp55-prod.herokuapp.com/Project/create_account.php">https://kp55-prod.herokuapp.com/Project/create_account.php</a> </td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain the logic behind the APY value</td></tr>
<tr><td> <em>Response:</em> <ul><li>Standard savings and loan APY percentages are added to System properties table and<br>gets called based on the name (either "savings" or "loan")</li><li>the admin can trigger<br>applying interest</li><li>the admin will only see a listing of savings or loan accounts<br>and can filter accordingly (listed by latest apy calc to ensure they get<br>calculated)</li><li>when calculation is triggered the code uses the formula (Account_balance * (apy rate/100)/12months))<br>to get the interest amount</li><li>that amount is added to the balance (savings will<br>be positive loans will be negative)</li><li>when interest is charged or deposited, it can<br>be seen in the transaction history with the updated balance</li></ul><div><br></div><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User will be able to take out a loan </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot showing the form for opening a loan along with the system generated APY</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314337-88cff46c-f411-47e9-9a77-dfccd5490a1b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>form for opening a loan along with the system generated APY<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot showing the user's accounts that can be deposited into</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314348-7ceef888-4afa-4a8a-ad9e-07e81d752331.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing the user&#39;s accounts that can be deposited into<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot from the db showing the loan account has a negative balance and the generated transaction</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314374-087eb2d1-8be5-414e-bdd6-9cbe3d2d79b5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>db showing the loan account has a negative balance and the generated transaction<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314377-6115b33d-3e25-4329-bb1f-4ab7466cb7db.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>generated transactions<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314401-a173d9d7-a7f0-46b0-8ada-ec149d522c13.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>SystemProperties table data related to loan account (name = loan)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot from the User's account list page showing the loan displaying as a positive value</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314433-c263dc12-79ec-4198-8bf5-457fca0388fb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>User&#39;s account list page showing the loan displaying as a positive value (first<br>entry)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a screenshot showing the code logic for updating the loan's balance per the requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314444-6e7305ce-b03e-419d-a9ed-94417af2515e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>code logic for updating the loan&#39;s balance <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314447-5f1961e6-2aeb-47cb-8004-6a9ad04e97ae.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>code logic for updating the loan&#39;s balance <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314450-0045eb9f-9fac-4091-a745-1d1cd4a0c38c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>code logic for updating the loan&#39;s balance <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314746-7ad5c6d7-1b42-4254-8279-8aeef48b1e2e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Admin triggers application of interest<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314751-97954740-a04c-4bb9-bda3-77477f63f156.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Admin triggers application of interest<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314722-e44bb073-4edf-4799-bdf2-dbf37952a169.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>query selects all account that arent checking (comments includes possible future update)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314885-9420a4e3-869e-449d-b543-31b31a887c90.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>when button for calculation is triggered, apply interest function is called<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314913-702ffbf4-381c-4adb-b564-7e5ea94afbd6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>creates a single transaction entry for user to see<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314972-4dc3b52e-42d4-4633-a1bf-721dc3d877b1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>example of transaction history entry for interest on a loan<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183314975-3264c7b4-c472-47a2-a97a-42a0e4376be6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>example of transaction history entry for interest on a savings account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add screenshot showing user can't transfer more money from a loan account (alternatively don't show loan accounts in the dropdown for transfer transactions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183315096-d5d438eb-0d2d-4ba1-b8a2-db66de8e2411.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>won&#39;t show loan accounts in the dropdown for source<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183315395-6a810dd0-ab22-4ef1-9af2-1718217b0732.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>will show loan accounts in the dropdown for source<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Add screenshots of any other errors and success</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183315601-ddaeb033-4206-47ae-88d9-aea6eb3b40ac.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>create loan error messages<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183315602-69f0f3df-e6f7-4a78-8723-5a0d1274071e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>create loan error messages<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183315717-1bd64b05-8709-4ed9-8346-a1a7f3842922.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>transfer to loan error message: if user tries to pay off a loan<br>that has already been paid off<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183315733-2bde21b1-83e0-4c50-bcc3-66fe942aed91.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>transfer to loan error message: if user tries to pay off a loan<br>with more than the exact amount in the loan balance<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 8: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/83">https://github.com/kx5hu/IT202-451/pull/83</a> </td></tr>
<tr><td> <em>Sub-Task 9: </em> Add link to create/open loan page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://kp55-prod.herokuapp.com/Project/create_account.php">https://kp55-prod.herokuapp.com/Project/create_account.php</a> </td></tr>
<tr><td> <em>Sub-Task 10: </em> Briefly explain the special code implementations for loans</td></tr>
<tr><td> <em>Response:</em> <ul><li>Loans html will have a div tag that contains an additional select input<br>for selecting an account to deposit the amount into.</li><li>This div tag will either<br>be displayed or hidden based on the account type the user selects (checking,<br>savings, loan)</li><li>similar logic is used for displaying the different APY for savings and<br>loan</li></ul><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Listing accounts should show applicable APY or - if none is set for a particular account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the account list showing a combination of checkings, savings, loans, etc</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183315767-543f19db-a385-418b-a993-bee72a67dad7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>account list showing a combination of checkings, savings, loans, etc<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/84">https://github.com/kx5hu/IT202-451/pull/84</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the Account list page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://kp55-prod.herokuapp.com/Project/my_accounts.php">https://kp55-prod.herokuapp.com/Project/my_accounts.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> User will be able to close an account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot showing validation that an account can't be closed if it has a balance (regular account and loan)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183315800-5877a563-0843-435b-a010-c8b0d43b39db.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>validation that an account can&#39;t be closed if it has a balance (regular<br>account and loan)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot from the DB showing a closed account as inactive</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183315823-e9608cd6-be1d-4466-b162-f80eee6f2885.png"/></td></tr>
<tr><td> <em>Caption:</em> <p> DB showing a closed account as inactive (entry #10)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshots of the various account list queries (in the code) showing the changes to use is_active</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183315994-e862f237-82c4-4545-b64c-59d25fdd7f87.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>account list queries (in the code) showing the changes to use is_active<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183315998-4909a679-9efc-45fd-9e14-b6dff86de884.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>account list queries (in the code) showing the changes to use is_active<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183316012-88f3d511-01a8-482e-a489-f69b3bff2913.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>account list queries (in the code) showing the changes to use is_active<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183316021-3e49193a-209b-499a-afaa-17ff1f8a6345.png"/></td></tr>
<tr><td> <em>Caption:</em> <p> use of is_active in query for deposits/withdrawals/external trasnfers<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183316041-deb77e67-ffdb-4bdf-8af9-d0af28bb4457.png"/></td></tr>
<tr><td> <em>Caption:</em> <p> use of is_active in query for accounts list<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/85">https://github.com/kx5hu/IT202-451/pull/85</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a link to the page where a user can close an account</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://kp55-prod.herokuapp.com/Project/my_accounts.php">https://kp55-prod.herokuapp.com/Project/my_accounts.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone4 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183316133-2abdfe99-7483-4b35-b968-4070a946b081.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>issues are done/closed (project board)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/183316134-6eef373f-961f-43c1-9598-036960253527.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>issues are done/closed (project board) (scrolled down)<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-451-M22/it202-milestone-4-bank-project/grade/kp55" target="_blank">Grading</a></td></tr></table>