# Users
A User is an access account with corresponding capabilities within the WordPress installation. 

Each WordPress user has, at the bare minimum, 
- a username, 
- password and 
- email address.


Once a user account is created, that user may log in using the WordPress Admin (or programmatically) to access WordPress functions and data. 

WordPress stores the Users in the users table.

---

# Roles and Capabilities
Users are assigned roles, and each role has a set of capabilities.

You can create new roles with their own set of capabilities. Custom capabilities can also be created and assigned to existing roles or new roles.

In WordPress, developers can take advantage of user roles to limit the set of actions an account can perform.