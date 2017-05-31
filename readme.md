# Codeship Pro PHP Laravel Example

[ ![Codeship Status for hiimtaylorjones/codeship-laravel](https://app.codeship.com/projects/9c4ea360-15b1-0135-f340-62bb81783d1a/status?branch=master)](https://app.codeship.com/projects/217976)

## Overview
The following repository is a `todo` API example developed with PHP and the Laravel framework.

This repo serves two main goals:

1. Example application using [Codeship Basic]()
2. A [Todo Backend](http://todobackend.com/) community project.  

The following `README` is a guide to build and deploy with Codeship Pro You will also be able to run this project locally, and use it as a starter app for PHP-Laravel Docker projects.

Be sure to star/watch this repo to stay up-to-date with any changes. If you have any questions or suggestions regarding this example , please submit an [issue here](https://github.com/codeship-library/php-laravel-todoapp/issues/new).

## Getting Started

There are a few resources to make sure you have available during this guide.

1. A local instance of [Docker Community Edition](https://www.docker.com/community-edition#/download)
2.  A [Codeship.](https://app.codeship.com/registrations/new) Account
3. A [Laravel Forge](https://forge.laravel.com/auth/register) Account - requires subscription
4. A [DigitalOcean](https://cloud.digitalocean.com/registrations/new) or [Amazon Web Services](https://www.amazon.com/ap/signin?openid.assoc_handle=aws&openid.return_to=https%3A%2F%2Fsignin.aws.amazon.com%2Foauth%3Fresponse_type%3Dcode%26client_id%3Darn%253Aaws%253Aiam%253A%253A015428540659%253Auser%252Fawssignupportal%26redirect_uri%3Dhttps%253A%252F%252Fportal.aws.amazon.com%252Fbilling%252Fsignup%253Fnc2%253Dh_ct%2526redirect_url%253Dhttps%25253A%25252F%25252Faws.amazon.com%25252Fregistration-confirmation%2526state%253DhashArgs%252523%2526isauthcode%253Dtrue%26noAuthCookie%3Dtrue&openid.mode=checkid_setup&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&action=&disableCorpSignUp=&clientContext=&marketPlaceId=&poolName=&authCookies=&pageId=aws.ssop&siteState=pre-register%2Cen_US&accountStatusPolicy=P1&sso=&openid.pape.preferred_auth_policies=MultifactorPhysical&openid.pape.max_auth_age=120&openid.ns.pape=http%3A%2F%2Fspecs.openid.net%2Fextensions%2Fpape%2F1.0&server=%2Fap%2Fsignin%3Fie%3DUTF8&accountPoolAlias=&forceMobileApp=0&language=en_US&forceMobileLayout=0) Account
5. Some sort of source control hosting code account ( [GitHub](https://github.com/) , [Bitbucket](https://bitbucket.org/account/signup/) , [GitLab](https://gitlab.com/users/sign_in) )
6. A local download of our application found [here](https://github.com/hiimtaylorjones/codeship-laravel)
7. A hosted (forked) instance of this application on the source control hosting account of your choice.


## Continuous Integration with Codeship

Continuous Integration requires developers to integrate code to a repository that is then verified by an automated build.

This project uses [PHPunit](https://phpunit.de/) integration testing of the `todo` api.  Every commit into the shared repo will be tested to verify the code is working correctly before allowing it to be merged.

In this section, you will set up your repository, create a Codeship project, and test the build locally using Jet CLI.

### Fork repo
Using the account you set up in the Getting Started section, you will now create your own repository to connect to Codeship.

Since this repository is on Github, you can [fork this repo](https://help.github.com/articles/fork-a-repo/) and move on to the next step. If you are using Bitbucket/Gitlab, you will need to perform a few additional steps.

1. Create a new repository
  1. [Bitbucket](https://confluence.atlassian.com/bitbucket/create-a-git-repository-759857290.html)
  2. [Gitlab](https://docs.gitlab.com/ee/gitlab-basics/create-project.html)
2. Download this repo's [source zip file](https://github.com/codeship-library/php-laravel-todoapp/archive/master.zip)
3. Extract the zip, and navigate to the source code folder.
4. Use the following terminal commands (assuming you are using Git)

```
git init
git remote add origin REPOSITORY_CLONE_URL
git add .
git commit
git push -u origin master
```

> Make sure to copy the 'Repository Clone URL' link for the next step, you will use it to set up the project in Codeship.

You now should have a remote repository that is publicly accessible in your account.

### Create project in Codeship

Now that your repository is setup, the next step is to create the project in Codeship, so when you push to the remote, tests will run automatically, making continuous integration easy.

1. Login to Codeship (if not already)
2. Navigate to `Projects` screen, then click the `New Project` button
  + You should now be in the project setup screen
3. `Connect Your SCM`: Select the source code management (SCM) tool you set up in the previous step.
 + if you originally signed up with an SCM different than above, we will connect to the service during this step
4. `Choose Your Repository`: Copy/Paste the Repository Clone URL link from previous step
5. Click the `Connect` button
6. `Configure Project`: Click the `Select Basic Project` button
  + The setup instructions displayed can be ignored for now, but will be here to remind you in the future

Your project is set up at this time, and any code commited and pushed to the repository will now run builds automatically, based on our current setup.

> Note: The current setup will attempt to deploy on master, which will fail until we set these up.  We will test the build locally without the deployment first.

If you run into trouble at any point, please submit an [issue here](https://github.com/hiimtaylorjones/codeship-laravel/issues/new).
