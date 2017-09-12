<?php
namespace Trois\Fundraising\View\Cell;

use Cake\View\Cell;

/**
 * Contributions cell
 */
class ContributionsCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
      $this->loadModel('Contributions');
      $contributions = $this->Contributions->find('all', [
        'conditions'=>['Contributions.active'=>true]
      ]);
      $this->set('contributions',$contributions);
    }
}
