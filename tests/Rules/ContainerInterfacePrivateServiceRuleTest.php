<?php
declare(strict_types=1);

namespace Lookyman\PHPStan\Symfony\Rules;

use Lookyman\PHPStan\Symfony\ServiceMap;
use PHPStan\Rules\Rule;

final class ContainerInterfacePrivateServiceRuleTest extends \PHPStan\Testing\RuleTestCase
{

	protected function getRule(): Rule
	{
		$serviceMap = new ServiceMap(__DIR__ . '/../container.xml');

		return new ContainerInterfacePrivateServiceRule($serviceMap);
	}

	public function testGetPrivateService(): void
	{
		$this->analyse([__DIR__ . '/data/ExampleController.php'], [
			[
				'Service "private" is private.',
				14,
			],
		]);
	}

}
