<?php

interface CategorieDAO{
	public function select(int $id);
	public function selectAll();
}