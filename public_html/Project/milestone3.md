<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 Bank Project</td></tr>
<tr><td> <em>Student: </em> Krishna Patel(kp55)</td></tr>
<tr><td> <em>Generated: </em> 7/30/2022 6:57:26 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-451-M22/it202-milestone-3-bank-project/grade/kp55" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone3 branch</li><li>Create a new markdown file called milestone3.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone3.md</li><li>Add/commit/push the changes to Milestone3</li><li>PR Milestone3 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes to get ready for Milestone 4</li><li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on GitHub and everywhere else. Images are only accepted from dev or prod, not localhost. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User will be able to transfer between their accounts </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of transfer page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181937131-a7afb295-6589-4173-b3df-eae2236155a7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Internal Transfer Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot showing dropdown values</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181937152-2bd587cc-f0a8-4a7f-887d-e44ff8ed0b1e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Account source drop down<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181937164-58d3fea8-5fa7-4c23-b0a7-d2a8f781e691.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Account destination drop down<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot showing user can't transfer more funds than they have</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181937193-507cc82c-4170-4e3f-9a4f-bacae0818b41.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>input for: user can&#39;t transfer more funds than they have<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181937202-c7f329fd-780b-4b9d-900e-d28743939411.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>output for: user can&#39;t transfer more funds than they have<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add screenshot showing user can't transfer to the same account</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181937244-2acde757-bb22-42d6-b3f9-1b87e47dd561.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>user can&#39;t transfer to the same account<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182002041-de182fb5-8004-4000-854e-478e7cd75b2a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>server-side code snippet for: user can&#39;t transfer to the same account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add screenshot showing you can't transfer an negative balance</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181996896-37f94e9f-b766-42b5-a0d6-8a059a564d9d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>can&#39;t transfer an negative balance<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182002234-8eaf7102-afb3-4a2e-aaa6-320a1bc5f269.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>server-side code snippet for: can&#39;t transfer an negative balance<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add screenshot of the generated transaction history from the db</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181996917-10bf6c9e-1eed-4453-a038-81816e7c656a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>generated transaction history from the db (last two entries that are listed)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a screenshot of the Accounts table showing both affected accounts</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181996954-e6c76704-6085-4b3f-ab3d-6b422cfa615f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Accounts table showing both affected accounts (first two entries)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 8: </em> Briefly explain the code process/flow of a transfer including how the accounts are fetched for the dropdowns</td></tr>
<tr><td> <em>Response:</em> <ol><br><li>get user id from logged in user<div>2. using user id, create an<br>sql query for account table, fetching all the account ids, numbers and balances<br>associated with the user id</div><div>3. for each loop in php to output a<br>selection option for each account number and its associated balance.</div><br></li><br></ol><br></td></tr>
<tr><td> <em>Sub-Task 9: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/64">https://github.com/kx5hu/IT202-451/pull/64</a> </td></tr>
<tr><td> <em>Sub-Task 10: </em> Add link to transfer page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://kp55-prod.herokuapp.com/Project/ext_transfer.php">https://kp55-prod.herokuapp.com/Project/ext_transfer.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Transaction History Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of transaction history page showing the new transfer transaction</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181997044-eb86e536-ebad-4ada-8a2b-29b295ea1e19.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>transaction history page showing the new transfer transaction (first entry)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181997049-16699191-aabc-4a51-a8da-9c4ac0685df8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>transaction history page showing the new transfer transaction (first entry)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots demonstrating the filters and pagination</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181997151-83cc866b-187e-40de-bfdf-42b633b7733f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>pagination (page 1 first 10 entries)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181997158-d0a3c85b-95c4-4ac7-922a-3c5e6d891386.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>pagination (page 2 remaining entries)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181997239-34c9936d-8258-43aa-8f91-fc717a83f95c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>filter for dropdown options<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181997240-66732df2-b27e-48ab-bac1-6989d8f7eebb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>filter for dropdown options<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181997241-facdaa01-002a-4a97-bf19-8a2c128e2fa8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>filter for dropdown options<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181997266-e40e7e98-b5d7-40e7-8808-9e05a80a56fa.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>filter for date range<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181997326-3af12ae6-0144-44b0-958d-005571ac4de2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>mixed filtering<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how the filters/pagination work</td></tr>
<tr><td> <em>Response:</em> <ol><br><li>html form takes drop down input selection for each transaction type and<br>two data inputs: start and end for date range<div>2. php GETS the input<br>otherwise it is defaulted to blank and empty</div><div>3. based on if-statements passing that<br>check for inputs, the base query which fetches the entries is concatenated with<br>the the query based on the filter selection</div><div>4. whatever is returned will output<br>to the screen</div><div>5. pagination done by following video steps and increased entries from<br>3 to 10 based on requirements. code keep track of the first and<br>last entry on each page, updating it for when the next page is<br>to be displayed and sql statement is executed based on this range of<br>entries and the above filters.&nbsp;</div><br></li><br></ol><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/65">https://github.com/kx5hu/IT202-451/pull/65</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add link to Transaction History page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://kp55-prod.herokuapp.com/Project/transaction_history.php">https://kp55-prod.herokuapp.com/Project/transaction_history.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User's profile First name and Last name </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the user's profile with the new fields</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181998658-509d316b-bec3-4377-a7ef-4a0be56b0741.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>user&#39;s profile with the new fields<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/181998762-1c78aa1f-a3a7-41c2-856d-b756dbe37e2b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>registration with the new fields<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/66">https://github.com/kx5hu/IT202-451/pull/66</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add link to profile page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://kp55-prod.herokuapp.com/Project/profile.php">https://kp55-prod.herokuapp.com/Project/profile.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://kp55-prod.herokuapp.com/Project/register.php">https://kp55-prod.herokuapp.com/Project/register.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> User will be able to transfer funds to another user </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the external transfer page with filled in data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182000022-eeee3359-9593-4377-9b7f-a1874e424253.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>dashboard with external transfer added<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182002480-76a30dfe-e55c-4478-9e04-d3ba4835ec33.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>external transfer page with filled in data<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot showing user can't send more than they have</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182002502-ad661e17-7f1a-4770-8dfd-7a3da7d7eecc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>input: user can&#39;t send more than they have<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182002504-18726829-24d5-428f-bec1-d78b3c6b9213.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>output: user can&#39;t send more than they have<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182002162-fab5fc61-a6d0-4d51-bd6f-83c829ecac2f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>server-side code snippet: user cant send more than they have<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot showing they can't send a negative amount</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182002522-1debdde6-ef31-4390-934e-9ce4407f2a8a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>can&#39;t send a negative amount<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182002256-053ff658-9822-4c2b-ab41-8f3878f3378e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>server-side code snippet: cant send a negative amount<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add screenshot(s) showing message if a user doesn't exist and/or a destination account wasn't found</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182002539-1e2ccae2-b0f1-4456-886c-1c8d39806d31.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>input: user doesn&#39;t exist and/or a destination account wasn&#39;t found<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182002540-0605f8d6-34d3-44bd-8b3f-82ffdee95e28.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>output: user doesn&#39;t exist and/or a destination account wasn&#39;t found<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182002175-a9025c31-4008-4aca-a9ca-b65b93f8feff.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>server-side code snippet: user doesn&#39;t exist and/or a destination account wasn&#39;t found<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182002177-ae9da173-962d-41b5-9f9c-3546142c08a1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>server-side code snippet: user doesn&#39;t exist and/or a destination account wasn&#39;t found<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add screenshot of the transactions table showing the recorded transfer</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182001687-f81bdea7-eb54-499b-8672-038cc771678c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>transactions table showing the recorded transfer (last two entries)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add screenshot(s) showing the updated account balances</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182001693-9791cf78-9da6-45d6-9d63-debc1516f664.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>updated account balances (entries #6 and #9)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain the process of looking up the target user's account and the validation logic</td></tr>
<tr><td> <em>Response:</em> <ol><br><li>last name an 4 digits input from html form<div>2. client side and<br>server side validation checks to make sure last name is not blank and<br>that last 4 digits follows a pattern of a string with only 4<br>numbers</div><div>3. once passed, sql statement is generated by getting the account id from<br>accounts table and inner joining users table if the user has the inputted<br>last name AND the account number matches the 4 digits from the end<br>using LIKE, limiting the fetched result to 1</div><div>4. if the id is retrieved,<br>it is used to make the transaction, otherwise 0 is passed and if-statement<br>based on the result of the account&nbsp; id will either allow the transaction<br>to occur or prevent the process from occurring if 0 is retreived.</div><br></li><br></ol><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/kx5hu/IT202-451/pull/67">https://github.com/kx5hu/IT202-451/pull/67</a> </td></tr>
<tr><td> <em>Sub-Task 9: </em> Add link to external transfer page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://kp55-prod.herokuapp.com/Project/ext_transfer.php">https://kp55-prod.herokuapp.com/Project/ext_transfer.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone3 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/84756926/182001723-9659f1ab-cfab-4ac1-ac1f-77faeaf7545c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>issues are done/closed (project board)<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-451-M22/it202-milestone-3-bank-project/grade/kp55" target="_blank">Grading</a></td></tr></table>