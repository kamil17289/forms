<?php

namespace Nethead\Forms\Integrations\Laravel;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelForm
 * @package Nethead\Forms\Integrations\Laravel
 */
abstract class ModelForm extends LaravelForm {
    /**
     * @var Model|null
     */
    protected $model = null;

    /**
     * ModelForm constructor.
     * @param Model $model
     * @param string $title
     * @param bool $withFiles
     * @param string $charset
     * @throws \Exception
     */
    public function __construct(Model $model, string $title = '', bool $withFiles = false, string $charset = 'UTF-8')
    {
        $this->model = $model;

        $method = $this->model->exists ? 'PATCH' : 'POST';

        parent::__construct($title, $method, $withFiles, $charset);
    }

    /**
     * @param Model $model
     * @return ModelForm
     * @throws \Exception
     */
    public static function createFromModel(Model $model)
    {
        $form = new static($model);

        if ($model->exists) {
            $form->fillFromArray($model->toArray());
        }

        return $form;
    }

    /**
     * @param Model $model
     */
    public function fillFromModel(Model $model)
    {
        $this->fillFromArray($model->toArray());
    }

    /**
     * @return Model|null
     */
    public function getModel(): ?Model
    {
        return $this->model;
    }

    /**
     * @param Model|null $model
     */
    public function setModel(?Model $model): void
    {
        $this->model = $model;
    }
}