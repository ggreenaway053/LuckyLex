using UnityEngine;
using System.Collections;

public class MeleeState : MonoBehaviour, IEnemyState {
	#region IEnemyState implementation

	private enemy enemy;

	private float attackTimer;
	private float attackCoolDown = 3;
	private bool canAttack = true;

	public void Execute ()
	{


		AttackPlayer ();

		if (!enemy.InAttackRange && enemy.Target == null) 
		{
			enemy.ChangeState (new PatrolState ());
		}
		else if(enemy.Target == null)
		{
			enemy.ChangeState (new PatrolState());
		}
		
	}

	public void Enter (enemy enemy)
	{
		this.enemy = enemy;
	}

	public void Exit ()
	{
		
	}

	public void OnTriggerEnter (Collider2D other)
	{
		
	}

	private void AttackPlayer()
	{
		attackTimer += Time.deltaTime;

		if (attackTimer >= attackCoolDown) 
		{
			canAttack = true;
			attackTimer = 0;
		}

		if (canAttack) 
		{
			canAttack = false;
			enemy.enemyAnimator.SetTrigger ("attack");
		}
		
	}

	#endregion

}