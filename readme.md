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
6. `Configure Project`: Click the `Select Pro Project` button
  + The setup instructions displayed can be ignored for now, but will be here to remind you in the future

Your project is set up at this time, and any code commited and pushed to the repository will now run builds automatically, based on our current setup.

> Note: The current setup will attempt to deploy on master, which will fail until we set these up.  We will test the build locally without the deployment first.

### Download Codeship encryption key

While you are in the Codeship project, there is an encryption key you will be using for other steps that can be downloaded now. The encryption key can be used to encrypt sensitive data so it can be safely committed.

1. In project settings, click `General` in the left menu
2. Download the `AES key`, and move it to your project's root folder
3. Rename the file to `codeship.aes`

> Alternatively, you can create the file `codeship.aes` and copy paste the key directly into that file.

### Test locally with Jet CLI

In the first part of this tutorial, you should have installed the `Jet CLI`.  If not, make sure you do that now.  If you run `jet` in your terminal you should see the following output

```
Usage:
  jet [command]
....
```

If everything is working properly, you can now test the build.

1. Run `jet steps`
  + The output is exactly what you will see in Codeship
2. After the build runs, you should end up with the following output in your terminal:

```
...
...
{StepFinished=step_name:"tests" type:STEP_FINISHED_TYPE_SUCCESS}
{StepFinished=step_name:"deploy" type:STEP_FINISHED_TYPE_SKIPPED}
```
At this point, this build will work in Codeship. The deploy step was skipped because the local build was not tagged.  If you run `jet steps --tag master` you would see the build process start immediately following. This will fail because there are a couple more steps to finalize.

Let's move on and do that now.

> If you want to avoid running the deployment step and push the current code into your repository, you can create a new branch. This will bypass the deployment in Codeship and only run the build.

## Continuous Deployment to Heroku with Codeship

Much like continuous integration, continuous deployment is the practice of shipping code to production on a frequent basis. With Codeship, you can add a deployment step that runs when all tests pass. You can also filter based on specific criteria like tags, which this repo does. When the branch is `master` and all tests pass, we deploy immediately following to Heroku.

Let's get the app set up, and start deploying code.

### Create Heroku app
1. Login to Heroku (if not already)
2. Click `New` -> `Create New App`
  + You can leave the defaults, or change them as needed
3. Click the `Create App` button

This app uses [`PostgreSQL`](https://www.postgresql.org/) as it's database, and Heroku has a free add-on you can use.

1. Click `Resources`
2. Under `Add-ons`, search for `postgres`
3. In the results drop down, click on  "Heroku Postgres"
4. Leave the selction as `Hobby Dev - Free`, then click the `Provision` button.

Copy the new application name for use later.

### Get Your Heroku API key
1. Click on your avatar in the upper right, then click `Account Settings`
2. Near the bottom, you will find `API key`. Click the `Reveal` button
3. Copy the API key
4. In the project files on your local machine, open `deployment.env.sample` and change `your_api_key_here` to your api key without any qutes.
13. Rename `deployment.env.sample` to `deployment.env`

### Create encrypted files

In a previous step, you should have created the `codeship.aes` file. This encryption key can be used to encrypt sensitive data so it can be safely committed.

In this step, we will be encrypting the Heroku api key file you just created.

1. In your terminal, navigate to your project's root folder.
2. Ensure the `codeship.aes` and `deployment.env` files.
3. Run the command `jet encrypt deployment.env deployment.env.encrypted`

This will encrypt the file with your api key from Heroku. the unencrypted `deployment.env`, and `codeship.aes` key are both in the .gitignore file and will not be commited to the repository.


### Commit changes and push

At this point, you have everything you need to test and deploy the project.

To simplify the deployment to Heroku, Codeship provides a Docker image called [`codeship/heroku-deployment`](https://documentation.codeship.com/pro/continuous-deployment/heroku/). We will be using this to deploy.

1. Open the `codeship-steps.yml` file
2. Locate the lines `command: codeship_heroku deploy /deploy php-laravel-todoapp` and `command: heroku run --app php-laravel-todoapp -- php artisan migrate --no-interaction`
3. Replace `php-laravel-todoapp` with your Heroku application name.
4. Make sure all files are added, and commit your changes.
3. Push to the master branch of your remote repository.
4. Open your Codeship project in a browser.
5. Click the build to watch it happen.

When complete and the build is green, you should now be able to navigate to the app with the Heroku provided url `yourappname.heroku.com`.

If you run into trouble at any point, please submit an [issue here](https://github.com/codeship-library/php-laravel-todoapp/issues/new).
