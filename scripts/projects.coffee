---
---

class Project
    constructor: (@title, @section, @image, @link) ->

    # create the project's html card. template should be a jQuery element
    # and is cloned and modified with this projects attributes
    createHtml: (template) ->
        $project = template.clone()
        $project.find('.title').html(@title)
        $project.find('img').attr('src', @image)
        $project.find('a').attr('href', @link)
        $project
        
# Captitalize each word in a string
# e.g. "hello, lovely evening" -> "Hello, Lovely Evening"
capitalize = (str) ->
    str.split(' ').map((word) -> word.charAt(0).toUpperCase() + word.slice(1)).join(' ')

# Transforms a string from the form "this-is-a-heading" to "This Is A Heading"
# returns a jQuery h1 element
createHeading = (title) ->
    $heading = $(document.createElement('h1'))
    $heading.text(capitalize(title.replace('-', ' ')))
    $heading

# List of all projects using Liquid
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
    console.log("""Hello brave traveller!
                If you're looking for the source \
                code for this site, it is available on github:
                https://github.com/aidangrabe/aidangrabe.com""")

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

    # create the new layout with headings for each section
    for category, projects of categories
        $heading = createHeading(category)

        $row = document.createElement('div')
        $row = $($row)
        $row.addClass('projects')

        # create the projects for the current row, and append them in
        for project in projects
            $project = project.createHtml($projectDiv)
            $row.append($project)

        $heading.appendTo($mainContainer)
        $row.appendTo($mainContainer)
