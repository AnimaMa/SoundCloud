@extends('_layout')
@section('content')


<div id="app">
    <full-page :options="options" id="fullpage" ref="fullpage">
        <div class="section">
            <h3>vue-fullpage.js</h3>
        </div>
        <div class="section">
            <div class="slide">
                <h3>Slide 2.1</h3>
            </div>
            <div class="slide">
                <h3>Slide 2.2</h3>
            </div>
            <div class="slide">
                <h3>Slide 2.3</h3>
            </div>
        </div>
        <div class="section">
            <h3>Section 3</h3>
        </div>
    </full-page>

    <a class="view-github" href="https://github.com/alvarotrigo/vue-fullpage.js" target="_blank">View on Github</a>

    <ul class="actions">
        <li @click="$refs.fullpage.api.moveSectionDown()" class="actions-button">Down</li>
        <li @click="$refs.fullpage.api.moveSectionUp()" class="actions-button">Up</li>
        <li @click="$refs.fullpage.api.moveTo(2,2)" class="actions-button">MoveTo</li>
        <li @click="$refs.fullpage.api.silentMoveTo(2,2)" class="actions-button">Silent Move</li>
        <li @click="$refs.fullpage.api.moveSlideRight()" class="actions-button">Move right</li>
        <li @click="$refs.fullpage.api.moveSlideLeft()" class="actions-button">Move lef</li>
        <li @click="$refs.fullpage.api.setAutoScrolling(false)" class="actions-button">Set autoScroll</li>
        <li @click="$refs.fullpage.api.setFitToSection(false)" class="actions-button">Set fitTo</li>
        <li @click="$refs.fullpage.api.setAllowScrolling(false)" class="actions-button">Set allowScroll</li>
        <li @click="$refs.fullpage.api.setKeyboardScrolling(false)" class="actions-button">Set keyboardScroll</li>
        <li @click="$refs.fullpage.api.setScrollingSpeed(4000)" class="actions-button">setScrollingSpeed</li>
        <li @click="$refs.fullpage.api.destroy('all')" class="actions-button">Destroy</li>
        <li @click="addSection()" class="actions-button">Add section</li>
        <li @click="removeSection()" class="actions-button">Remove section</li>
    </ul>
</div>


@endsection