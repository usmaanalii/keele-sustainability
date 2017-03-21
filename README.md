## Keele University Collaborative App Development

### Developing a web application for the Keele Sustainability Bungalow

**Team members**:

 * James Mitchell
 * Lee Parker
 * David Fredricks
 * Sudawan Kumdee
 * Usmaan Ali
 * Emma Cutler
 * Ryan Moffatt
 * Kaiyi Xiu


The web application, will be created using a **widget based** theme.

### **Features**

Based on the requirements gathering, we established that the client wanted a method for tracking the recycling of various materials. From this, we designed a mock up that enabled users to see the individual materials current recycle measurements along with the ability to add furhter input.

The design was created by **James Mitchell** and is largely influenced by the [Keele Style Guide](https://www.keele.ac.uk/brand/).

<img style="display: block; margin: 0 auto;" src="mockups/recycling-widget.jpg" width="250"/>

##### Development

One of the most important features of using the widget based approach, was that it alligned with the agile development approach that the team settled on. It promotes the idea of developing features independently with minimal dependencies on each other.
The recycling widget code is shown below. It has deliberately been designed to act as a shoe in template such that the material name acts as a parameter that can be manipulated based on what it being tracked.

###### Widget Markup

``` html
<div class="main paper-widget">

  <div class="metric">
    <h3>Paper</h3>
    <h2>12.6<span> kg</span></h2>
  </div>

  <div class="button-style">
  	<button class="expand paper"><div>+</div></button>
  </div>

</div>

<div class="add-info add-paper-info">
  <form class="input-form" action="">
    <p>Please enter the new measurement:</p>
    <br>
  <input class="input-text-area" type="text" name="measurement" value="Placeholder" size="36">
  <input class="form-submit-button" type="submit" value="Add">
  </form>
</div>
```

#### **Task List**

- [x] The Basic widget template has been designed
- [x] A button has been designed which toggles viewing the input area
- [x] The toggle button needs to rotate on click
- [ ] The toggle needs to be redesigned to be perfectly square
- [x] The text colour needs to match the background colour
- [x] The 'add' button needs to be styled according to the mockup
- [ ] Form inputs need to have relevent names for backend manipulation
- [ ] Code needs to converted to use more responsive friendly measurements

The current web application can be found [here](https://usyyy.github.io/).


Feel free to suggest improvements to the web application.
