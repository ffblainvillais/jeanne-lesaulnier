<?php

namespace Admin\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

use Zend\Form\Element\Text;
use Zend\Form\Element\Select;
use Zend\Form\Element\Radio;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Submit;
use Zend\Form\Element\File;
use DoctrineModule\Form\Element\ObjectSelect;

class AddCreationForm extends Form implements InputFilterProviderInterface
{
    const TYPE_TEXT         = Text::class;
    const TYPE_SELECT       = Select::class;
    const TYPE_CHECKBOX     = Checkbox::class;
    const TYPE_RADIO        = Radio::class;
    const TYPE_HIDDEN       = Hidden::class;
    const TYPE_SUBMIT       = Submit::class;
    const TYPE_OBJECT       = ObjectSelect::class;
    const TYPE_FILE         = File::class;

    public function __construct()
    {
        parent::__construct('addAction');

        $this->add([
            'type'    => self::TYPE_TEXT,
            'name'    => 'title',
            'options' => [
                'label' => 'Titre',
            ],
        ]);

        $this->add([
            'type'    => self::TYPE_FILE,
            'name'    => 'logo',
            'options' => [
                'label' => 'Logo',
            ],
        ]);

        $this->add([
            'name'    => 'submit',
            'type'    => self::TYPE_SUBMIT,
            'attributes' => [
                'value' => 'Valider',
                'class' => null,
            ],
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [
            'title' => [
                'required' => true
            ],
            'logo' => [
                'required' => true,
            ],
        ];
    }

}
