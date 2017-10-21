<?php

function create($class, $properties = [])
{
	return factory($class)->create($properties);
}

function make($class, $properties = [])
{
	return factory($class)->make($properties);
}
