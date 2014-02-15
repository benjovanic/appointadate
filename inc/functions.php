<?php
/**
 * @author Ben Jovanic
 * @date 2014-02-15
 */
function form_validate($data, $type, $name)
{
	$invalid = "Invalid characters in {$name}.<br>";

	if (empty($data)) {
		if ($type == "req") {
			return "{$name} required.<br>";
		}
	}
	else {
		switch ($type) {
			case "email":
				if (!preg_match("/^([a-z\'\-]+)$/i", $data)) {
					return $invalid;
				}
				break;

			case "name":
				if (!preg_match("/^([a-z\'\-]+)$/i", $data)) {
					return $invalid;
				}
				break;

			case "alpha":
				if (!preg_match("/^([a-z]+)$/i", $data)) {
					return $invalid;
				}
				break;

			case "alnum":
				if (!preg_match("/^([a-z0-9]+)$/i", $data)) {
					return $invalid;
				}
				break;

			case "alpha_s":
				if (!preg_match("/^([a-z\s]+)$/i", $data)) {
					return $invalid;
				}
				break;

			case "alnum_s":
				if (!preg_match("/^([a-z0-9\s]+)$/i", $data)) {
					return $invalid;
				}
				break;

		}
	}
}

/**
 * @author Ben Jovanic
 * @date 2014-02-15
 */
function password_validate($p1, $p2)
{
	if (empty($p1) || empty($p2)) {
		return "Complete both password fields.<br>";
	}

	$error = "";

	if (!strcmp($p1, $p2)) {
		$error .= "Passwords do not match.<br>";
	}

	if (strlen($p1) < 8) {
		$error .= "Password length must be greater than 8.<br>";
	}

	return $error;
}