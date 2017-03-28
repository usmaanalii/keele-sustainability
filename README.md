## Keele University Collaborative App Development

### Developing a web application for the Keele Sustainability Bungalow

- [**Goals**](#goals)
- [**Team members**](#team-members)
- [**Design**](#design)
- [**Development**](#development)
- [**Task List**](#task-list)

#### Goals

Based on the requirements gathering, we established that the client wanted an application that enabled residents of the Keele Sustainability Bungalow to keep better track of the materials that they recycle. From the initial research, we decided that the most sensible approach would be to create a web application with the view of making it mobile friendly.

#### Team members:

 * James Mitchell
 * Lee Parker
 * David Fredricks
 * Sudawan Kumdee
 * Usmaan Ali
 * Emma Cutler
 * Ryan Moffatt
 * Kaiyi Xiu

#### Design

The design was created by **James Mitchell** and will utilize a **widget based** approach. Colour choices are largely influenced by the [Keele Style Guide](https://www.keele.ac.uk/brand/).

<p align="center">
     <img src="mockup/recycling-widget.jpg" width="250"/>
</p>


#### Development

One of the most important features of using the widget based approach, was that it alligned with the **agile development** approach that the team settled on. It promoted the idea of developing features iteratively with the aim of reducing dependencies.

The recycling widget code is shown below. It has been constructed to act as a template such that the **material name** acts as a parameter that can be manipulated based on what it being tracked.

##### Technologies

###### HTML, CSS (including SASS), jQuery

The Basic web development stack was used, along with SASS, a CSS preprocessor that was used in the **responsive grid**.

###### Bower

Bower, is used to manage components for front end development, this project is small in scope, however, in order to ensure the web application is scalable, it made sense to use a package manager.

So far, it has been used to download **jQuery** and **normalize.css**.

##### Markup walkthrough

###### Flexbox Grid

The `ul` tag represents the container for the widgets, and each widget is placed inside their own `li` tags. The SASS responsible for this behaviour can be seen in `src/css/sass/grid.scss` file.

``` html

<ul class="flex-container">
    <li class="flex-item">

    </li>
    <li class="flex-item">

    </li>
    <li class="flex-item">

    </li>
    <li class="flex-item">

    </li>
    <li class="flex-item">

    </li>
</ul>
```

###### Widget

Each widget consists of the following sections...

**Main display**

* Material name e.g. `compost`
* Material measurement e.g. `8.4`
* **+** `button`

**Add info**

* `input` area
* **add** `button`

``` html
<div class="widget-container compost-widget">
    <div class="material-details">
        <h1 class="material-name">Compost</h1>
        <h2 class="material-measurement">8.4<span class="metric">kg</span></h2>
    </div>

    <div class="add-button-style">
        <button id="compost"><div class="button-value">+</div></button>
    </div>
</div>
<div class="add-info-container add-compost-info">

    <form class="input-form" action="">
        <p>Please enter the new measurement:</p>

        <input class="input-measurement-area" type="number" name="compost-input">
        <input class="form-submit-button" type="submit" value="Add">
    </form>

</div>
```

#### Initial Task List

- [x] Design basic widget templates
- [x] Design a button that will be used to toggle the 'add info' area
- [x] Add an animation that rotates the button when clicked
- [x] Make the buttons contents transparent to match the background colour
- [x] Ensure the 'add' button is styled according to the mockup on all devices, default styled need to be disabled
- [x] Add relevent names to each form, for backend integration
- [x] Convert the code to be more responsive friendly
- [ ] **The toggle needs to be perfectly square**

The current web application can be found [here](https://usyyy.github.io/).

Feel free to suggest improvements to the web application.
