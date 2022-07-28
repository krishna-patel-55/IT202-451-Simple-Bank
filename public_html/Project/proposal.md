# Project Name: Simple Bank
## Project Summary: This project will create a bank simulation for users. They’ll be able to have various accounts, do standard bank functions like deposit, withdraw, internal (user’s accounts)/external(other user’s accounts) transfers, and creating/closing accounts.
## Github Link: [https://github.com/kx5hu/IT202-451/tree/prod/public_html/Project](https://github.com/kx5hu/IT202-451/tree/prod/public_html/Project)
## Project Board Link: https://github.com/kx5hu/IT202-451/projects/1
## Website Link: https://kp55-prod.herokuapp.com/Project
## Your Name: Krishna Patel

<!-- Line item / Feature template (use this for each bullet point) -- DO NOT DELETE THIS SECTION

- [ ] \(mm/dd/yyyy of completion) Feature Title (from the proposal bullet point, if it's a sub-point indent it properly)
  -  Link to related .md file: [Link Name](link url)

 End Line item / Feature Template -- DO NOT DELETE THIS SECTION --> 
### Proposal Checklist and Evidence

- Milestone 1
    - [x] \(07/02/2022) User will be able to register a new account
      -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md)
    - [x] \(07/02/2022) User will be able to login to their account (given they enter the correct credentials)
      -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md)
    - [x] \(07/04/2022) User will be able to logout
      -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md)
    - [x] \(07/04/2022) Basic security rules implemented
      -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md)
    - [x] \(07/05/2022) Basic Roles implemented
      -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md)
    - [x] \(07/06/2022) Site should have basic styles/theme applied; everything should be styled
      -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md)
    - [x] \(07/06/2022) Any output messages/errors should be “user friendly”
      -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md)
    - [x] \(07/04/2022) User will be able to see their profile
      -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md)
    - [x] \(07/06/2022) User will be able to edit their profile
      -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone1.md)
      
- Milestone 2
    - [x] \(07/17/2022) Create the Accounts table:
      - (id, account_number [unique, always 12 characters], user_id, balance (default 0), account_type, created, modified)
        -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md)
    - [x] \(07/17/2022) Project setup steps:
      - Create these as initial setup scripts in the sql folder:
        - Create a system user if they don’t exist
        - Create a world account in the Accounts table created above
          -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md)
    - [x] \(07/17/2022) Create the Transactions table:
      - (id, account_src, account_dest, balance_change, transaction_type, memo, expected_total, created, modified) 
        -  Link to related .md file: Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md)
    - [x] \(07/18/2022) Dashboard page:
      - Will have links for Create Account, My Accounts, Deposit, Withdraw Transfer, Profile
        - Links that don’t have pages yet should just have href=”#”, you’ll update them later
          -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md)
    - [x] \(07/19/2022) User will be able to create a checking account:
      - System will generate a unique 12 character account number
        - Options (strike out the option you won’t do):
          - Option 1: Generate a random 12 digit/character value; must regenerate if a duplicate collision occurs
          - ~~Option 2: Generate the number based on the id column; requires inserting a null first to get the last insert id, then update the record immediately after~~
      - System will associate the account to the user
      - Account type will be set as checking
      - Will require a minimum deposit of $5 (from the world account)
        - Entry will be recorded in the Transaction table as a transaction pair (per notes at end of document)
        - Account Balance will be updated based on SUM of balance_change of account_src
          - Do not set this value directly
      - User will see user-friendly error messages when appropriate
      - User will see user-friendly success message when account is created successfully
        - Redirect user to their Accounts page upon success
          -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md)
    - [x] \(07/20/2022) User will be able to list their accounts
      - Limit results to 5 for now
      - Show account number, account type, modified, and balance
        -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md)
    - [x] \(07/21/2022) User will be able to click an account for more information
      - Show account number, account type, balance, opened/created date of the selected account (from Accounts table)
      - Show transaction history (from Transactions table)
        - For now limit results to 10 latest
        - Show the src/dest account numbers (not account id), the transaction type, the change in balance, when it occurred, expected total, and the memo
          -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md)
    - [x] \(07/22/2022) User will be able to deposit/withdraw from their account(s)
      - Clearly label this activity with a heading showing “External Transfer”
      - Form should include a dropdown of the current user’s accounts (as account_src)
         Account list should show account number and balance
      - Form should include a field for the destination user’s last name
      - Form should include a field for the last 4 characters of the destination user’s account number (to lookup account_dest)
      - Form should include a field for a positive numerical value
      - Form should allow the user to record a memo for the transaction
      - System shouldn’t let the user transfer more than the balance of their account
      - System shouldn’t allow the user to transfer a negative value (i.e., can’t pull money from target user’s account)
      - System will lookup appropriate account based on destination user’s last name and the last 4 digits of the account number
      - Show appropriate user-friendly error messages
      - Show user-friendly success messages
      - Transaction will be recorded with the type as “ext-transfer”
      - Each transaction is recorded as a transaction pair in the Transaction table
        - These will reflect in the transaction history page
          -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone2.md)

  - Milestone 3
    - [x] \(07/25/2022) User will be able to transfer between their accounts
        - Clearly label this activity with a heading showing “Internal Transfer”
        - Form should include a dropdown for account_src and a dropdown for account_dest (only accounts the user owns; no world account)
            - Account list should show account number and balance
        - Form should include a field for a positive numeric value
        - System shouldn’t allow the user to transfer more funds than what’s available in account_src
        - Form should allow the user to record a memo for the transaction
        - Each transaction is recorded as a transaction pair in the Transaction table
            - These will reflect in the transaction history page
            * Note: Same process as withdraw/deposit
        - Show appropriate user-friendly error messages
        - Show user-friendly success messages
      -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone3.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone3.md)
    - [x] \(07/27/2022) Transaction History page (Same rules as the previous Milestone plus the below)
        - User will be able to filter transactions between two dates
        - User will be able to filter transactions by type (deposit, withdraw, transfer)
        - Transactions should paginate results after the initial 10
      -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone3.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone3.md)
    - [ ] \(mm/dd/yyyy) User’s profile page should record and show First and Last name
        - You may also capture this on the registration page, make note if you do
        - This will require an Alter Table statement for the Users table to include two new fields with default values
      -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone3.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone3.md)
    - [ ] \(mm/dd/yyyy) User will be able to transfer funds to another user’s account
        - Clearly label this activity with a heading showing “External Transfer”
        - Form should include a dropdown of the current user’s accounts (as account_src)
            - Account list should show account number and balance
        - Form should include a field for the destination user’s last name
        - Form should include a field for the last 4 characters of the destination user’s account number (to lookup account_dest)
        - Form should include a field for a positive numerical value
        - Form should allow the user to record a memo for the transaction
        - System shouldn’t let the user transfer more than the balance of their account
        - System shouldn’t allow the user to transfer a negative value (i.e., can’t pull money from target user’s account)
        - System will lookup appropriate account based on destination user’s last name and the last 4 digits of the account number
        - Show appropriate user-friendly error messages
        - Show user-friendly success messages
        - Transaction will be recorded with the type as “ext-transfer”
        - Each transaction is recorded as a transaction pair in the Transaction table
            - These will reflect in the transaction history page
            * Note: Same process as withdraw/deposit/transfer
      -  Link to related .md file: [https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone3.md](https://github.com/kx5hu/IT202-451/blob/prod/public_html/Project/milestone3.md)
<!--
- Milestone 4
  - (duplicate template here for Milestone 4 features)
  -->
### Intructions
#### Don't delete this
1. Pick one project type
2. Create a proposal.md file in the root of your project directory of your GitHub repository
3. Copy the contents of the Google Doc into this readme file per the template
4. Convert the list items to markdown checkboxes (apply any other markdown for organizational purposes)
5. Create a new Project Board on GitHub
   - Choose the Automated Kanban Board Template
   - For each major line item (or sub line item if applicable) create a GitHub issue
   - The title should be the line item text
   - The first comment should be the acceptance criteria (i.e., what you need to accomplish for it to be "complete")
   - Leave these in "to do" status until you start working on them
   - Assign each issue to your Project Board (the right-side panel)
   - Assign each issue to yourself (the right-side panel)
6. As you work
  1. As you work on features, create separate branches for the code in the style of Feature-ShortDescription (using the Milestone# branch as the source to branch from and to merge into)
  2. Add, commit, push the related file changes to this branch
  3. Add evidence to the PR (Feat to Milestone) conversation view comments showing the feature being implemented (these will be used to populate the related .md files for each milestone, forgetting to capture this will give you more work later on)
     - Screenshot(s) of the site view (make sure they clearly show the feature)
     - Screenshot of the database data if applicable
     - Describe each screenshot to specify exactly what's being shown
     - A code snippet screenshot or reference via GitHub markdown may be used as an alternative for evidence that can't be captured on the screen
  4. Update the checklist of the proposal.md file for each feature this branch is completing (ideally should be 1 branch/pull request per feature, but some cases may have multiple)
    - Basically add an x to the checkbox markdown along with a date after
      - (i.e.,   - [x] (mm/dd/yy) ....) See Template above
    - Add the pull request link as a new indented line for each line item being completed
    - Attach any related issue items on the right-side panel
  5. Merge the Feature Branch into your Milestone branch (this should close the pull request and the attached issues)
    - Merge the Milestone branch into dev, then dev into prod as needed (be sure it doesn't break anything in prod)
    - Last two steps are mostly for getting it to prod for delivery of the assignment 
  7. If the attached issues don't close wait until the next step
  8. Merge the updated dev branch into your production branch via a pull request
  9. Close any related issues that didn't auto close
    - You can edit the dropdown on the issue or drag/drop it to the proper column on the project board