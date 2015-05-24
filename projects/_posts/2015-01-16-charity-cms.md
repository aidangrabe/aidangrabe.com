---
layout: project
title: "Charity CMS"
category: "projects"
section: web
image: /res/img/projects/charity-cms/dashboard.png
github: https://github.com/aidangrabe/charity-cms
---

Charity CMS was a third-year group project in UCC where the objective was to
create a Wordpress-like Content Management System (_CMS_) tailored towards
charities.

# Role
There were three available roles for the project:

 1. **Developer**: In charge of implementing the websites front and back ends.
 2. **Project Manager**: In charge of meetings, organization, time-tracking, gantt
    charts etc.
 3. **Documenter**: The person in charge of creating a user manual on using the
    system and ensure the project was fully documented.

I was the developer for the project and so was tasked with implementing the
code.

# Features
The CMS had to stand out from regular CMSs and have charity-specific features.
The website is pretty much a blog with special kinds of posts such as posts
for lost animals which allow the poster special formatting options for posting
about lost animals such as contact numbers and descriptions of the animals.

We also added a donate feature using PayPal so members of charities could donate
money to help support their cause.

The site is useful for charity owners who can manage and update multiple charity
pages but also for charity members who can "heart" charities and get their 
updates on a central dashboard which the user can view when they log in.

# Technical
The site's backend was created in PHP and is built using the PHP
[Laravel framework](http://laravel.com/). The front-end is HTML, CSS and
JavaScript. We used MySQL for our database, but combined with Laravel's Eloquent
ORM (Object Relational Mapping) allowed us to store objects similar to a NoSQL
database or ActiveRecord.
