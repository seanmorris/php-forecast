<?php
(new Vrzno)->fetch('https://api.weather.gov/gridpoints/TOP/40,74/forecast')
->then(fn($r) => $r->json())->then(function($data) {
    $items = (array) $data->properties->periods;
    ?><h1>New York Forecast</h1><div><?php
    // var_dump($items);
    foreach($items as $item)
    {
        if(!is_array($item)) continue;
        $item = (object)$item;
        ?><div class = "forecast-day">
            <span class = "icon-row">
                <span class = "icon">
                    <span>
                    <?php if($item->isDaytime ?? false): ?>
                        <?php switch($item->shortForecast):
                            case 'Sunny':
                                ?>☀️<?php
                                break;
                            case 'Mostly Sunny':
                                ?>🌤️<?php
                                break;
                            case 'Mostly Clear':
                                ?>☀️☁️<?php
                                break;
                            case 'Mostly Cloudy':
                                ?>☁️<?php
                                break;
                            case 'Clear':
                                ?>☀️<?php
                                break;
                            case 'Partly Cloudy then Slight Chance Rain Showers':
                                ?>☀️🌧️<?php
                                break;
                            case 'Rain And Snow Showers Likely':
                            case 'Rain Showers then Rain And Snow Showers Likely':
                                ?>🌧️❄️<?php
                                break;
                            case 'Rain Showers':
                            case 'Chance Rain Showers':
                                ?>🌧️<?php
                                break;
                        endswitch; ?>
                    <?php else: ?>
                        <?php switch($item->shortForecast ?? null):
                            case 'Mostly Clear':
                                ?>🌕☁️<?php
                                break;
                            case 'Partly Cloudy then Slight Chance Rain Showers':
                                ?>🌕🌧️<?php
                                break;
                            case 'Mostly Cloudy then Slight Chance Rain Showers':
                                ?>☁️🌧️<?php
                                break;
                            case 'Rain And Snow Showers Likely':
                            case 'Rain Showers then Rain And Snow Showers Likely':
                                ?>🌧️❄️<?php
                                break;
                            case 'Rain Showers':
                            case 'Chance Rain Showers':
                                ?>🌧️<?php
                                break;
                            case 'Partly Cloudy':
                                ?>☁️🌕<?php
                                break;
                            case 'Mostly Cloudy':
                                ?>☁️<?php
                                break;
                            case 'Clear':
                                ?>🌕<?php
                                break;
                        endswitch; ?>
                    <?php endif; ?>
                    </span>
                </span>
                <span class = "col">
                    <b><?=$item->name ?? ''; ?></b>
                    <span class = "short-forecast"><?=$item->shortForecast ?? ''; ?></span>
                </span>
            </span>
            <span class = "small"><?=$item->detailedForecast; ?></span>
            <span class = "temperature">
                Temperature
                <b><?=$item->temperature; ?>°<?=$item->temperatureUnit; ?></b>
            </span>
            <span class = "temperature">
                Dewpoint
                <b><?=($item->dewpoint['value'] * (9/5)) + 32; ?>°<?=$item->temperatureUnit; ?></b>
            </span>
        </div>
        <?php
    } ?><div><?php
});