---
---

class Project
    constructor: (@title, @section, @image, @link) ->

capitalize = (str) ->
    str.split(' ').map((word) -> word.charAt(0).toUpperCase() + word.slice(1)).join(' ')

createHeading = (title) ->
    $heading = $(document.createElement('h1'))
    $heading.text(capitalize(title.replace('-', ' ')))
    $heading

projects = [
    {% for post in site.posts %}
        {% if post.category contains 'projects' %}
            new Project("{{ post.title }}", "{{ post.section }}",
                "{{ post.image }}", "{{ post.url }}")
        {% endif %}
    {% endfor %}
]

# Map $ to jQuery 
(($) ->) jQuery

$ ->
    # find the elements we need to use
    $mainContainer  = $('#main-content > article')
    $projectHeading = $('#project-heading')

    $projectDiv = $('.project').first()

    $projectContainer = $('.projects')

    # hide the default stuff
    $projectContainer.hide()
    $projectHeading.hide()

    # group the projects by their section
    categories = []
    for project in projects
        if categories.hasOwnProperty(project.section)
            categories[project.section].push project
        else
            categories[project.section] = [project]

    console.log(categories)

    # create the new layout with headings for each section
    for category, projects of categories
        $heading = createHeading(category)

        $row = document.createElement('div')
        $row = $($row)
        $row.addClass('projects')

        for project in projects
            $project = $projectDiv.clone()
            $project.find('.title').html(project.title)
            $project.find('img').attr('src', project.image)
            $project.find('a').attr('href', project.link)
            $row.append($project)

        $heading.appendTo($mainContainer)
        $row.appendTo($mainContainer)

    #$projectContainer.show()
