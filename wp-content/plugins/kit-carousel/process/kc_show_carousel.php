<?php

function kc_show_carousel($content)
{
    $html =
        '<section id="demos">
        <div class="row">
            <div class="large-12 columns">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <h4>1</h4>
                    </div>
                    <div class="item">
                        <h4>2</h4>
                    </div>
                    <div class="item">
                        <h4>3</h4>
                    </div>
                    <div class="item">
                        <h4>4</h4>
                    </div>
                    <div class="item">
                        <h4>5</h4>
                    </div>
                    <div class="item">
                        <h4>6</h4>
                    </div>
                    <div class="item">
                        <h4>7</h4>
                    </div>
                    <div class="item">
                        <h4>8</h4>
                    </div>
                    <div class="item">
                        <h4>9</h4>
                    </div>
                    <div class="item">
                        <h4>10</h4>
                    </div>
                    <div class="item">
                        <h4>11</h4>
                    </div>
                    <div class="item">
                        <h4>12</h4>
                    </div>
                </div>
// Place for buttons
            </div>
        </div>
    </section>';
    return $content . $html;
}