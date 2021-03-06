<?php

/**
 * @file
 * Contains Drupal\rules\Tests\RulesDrupalTestBase.
 */

namespace Drupal\rules\Tests;

use Drupal\Core\Action\ActionInterface;
use Drupal\Core\Action\ActionManager;
use Drupal\Core\Condition\ConditionManager;
use Drupal\Core\Entity\Query\ConditionInterface;
use Drupal\rules\Annotation\RulesExpression;
use Drupal\rules\Engine\RulesExpressionInterface;
use Drupal\rules\Plugin\RulesExpression\Rule;
use Drupal\rules\Plugin\RulesExpressionPluginManager;
use Drupal\simpletest\DrupalUnitTestBase;

/**
 * Base class for Rules Drupal unit tests.
 */
abstract class RulesDrupalTestBase extends DrupalUnitTestBase {

  /**
   * The rules expression plugin manager.
   *
   * @var RulesExpressionPluginManager
   */
  protected $rulesExpressionManager;

  /**
   * The condition plugin manager.
   *
   * @var ConditionManager
   */
  protected $conditionManager;

  /**
   * The rules action plugin manager.
   *
   * @var ActionManager
   */
  protected $actionManager;

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = array('rules', 'rules_test', 'system');

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
    $this->rulesExpressionManager = $this->container->get('plugin.manager.rules_expression');
    $this->conditionManager = $this->container->get('plugin.manager.condition');
    $this->actionManager = $this->container->get('plugin.manager.action');
  }

  /**
   * Creates a new rule.
   *
   * @return Rule
   */
  protected function createRule() {
    return $this->rulesExpressionManager->createInstance('rules_rule');
  }

  /**
   * Creates a new Rules expression.
   *
   * @param string $id
   *   The expression plugin id.
   *
   * @return RulesExpressionInterface
   */
  protected function createExpression($id) {
    return $this->rulesExpressionManager->createInstance($id);
  }

  /**
   * Creates a new action.
   *
   * @param string $id
   *   The action plugin id.
   *
   * @return ActionInterface
   */
  protected function createAction($id) {
    return $this->actionManager->createInstance($id);
  }

  /**
   * Creates a new condition.
   *
   * @param string $id
   *   The condition plugin id.
   *
   * @return ConditionInterface
   */
  protected function createCondition($id) {
    return $this->conditionManager->createInstance($id);
  }

}
